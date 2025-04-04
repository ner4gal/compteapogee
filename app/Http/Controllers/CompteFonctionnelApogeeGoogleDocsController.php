<?php

namespace App\Http\Controllers;

use Google\Client;
use Google\Service\Docs;
use Google\Service\Drive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompteFonctionnelApogeeGoogleDocsController extends Controller
{
    private $client;
    private $docsService;
    private $driveService;
    private $templateId = '1jX7WoMJc1OV-AfTBy80V6RISaa4fiwqUvVP6xNMJjlg'; // Original template file ID

    public function __construct()
    {
        $this->client = new Client();
        $this->client->setAuthConfig(storage_path('google-docs-key.json'));
        $this->client->addScope([Docs::DOCUMENTS, Drive::DRIVE]);

        $this->docsService = new Docs($this->client);
        $this->driveService = new Drive($this->client);
    }

    public function generateDocument(Request $request)
    {
        try {
            // ✅ 1. MAKE A COPY OF THE GOOGLE DOC TEMPLATE
            $copyTitle = "Generated_Document_" . time(); // Unique name for each copy
            $copyFile = $this->driveService->files->copy($this->templateId, new \Google\Service\Drive\DriveFile([
                'name' => $copyTitle
            ]));

            $copyDocId = $copyFile->getId(); // New document ID

            // ✅ 2. REPLACE PLACEHOLDERS IN THE COPIED DOCUMENT
            $replacements = [
                '{{etbl}}' => $request->input('etbl'),
                '{{dateDM}}' => $request->input('dateDM'),
                '{{demNTR}}' => $request->input('demNTR'),
                '{{nomPrenomUser}}' => $request->input('nomPrenomUser'),
                '{{userName}}' => $request->input('userName'),
                '{{fonction}}' => $request->input('fonction'),
                '{{strg1}}' => implode(', ', $request->input('centre_gestion', [])),
                '{{strg2}}' => implode(', ', $request->input('centre_traitement', [])),
                '{{strg3}}' => implode(', ', $request->input('centre_inscription_pedagogique', [])),
                '{{strg4}}' => implode(', ', $request->input('centre_incompatibilite', [])),
                '{{tele}}' => $request->input('tele'),
                '{{mac}}' => $request->input('mac'),
                '{{p1}}' => $request->input('p1') ? '✅' : '❌',
                '{{p2}}' => $request->input('p2') ? '✅' : '❌',
                '{{p3}}' => $request->input('p3') ? '✅' : '❌',
                '{{p4}}' => $request->input('p4') ? '✅' : '❌',
                '{{p5}}' => $request->input('p5') ? '✅' : '❌',
                '{{p6}}' => $request->input('p6') ? '✅' : '❌',
                '{{p7}}' => $request->input('p7') ? '✅' : '❌',
                '{{p8}}' => $request->input('p8') ? '✅' : '❌',
                '{{p9}}' => $request->input('p9') ? '✅' : '❌',
            ];

            // Apply replacements in the copied document
            $requests = [];
            foreach ($replacements as $placeholder => $value) {
                $requests[] = [
                    'replaceAllText' => [
                        'containsText' => ['text' => $placeholder, 'matchCase' => true],
                        'replaceText' => $value,
                    ],
                ];
            }

            // Update the copied document
            $this->docsService->documents->batchUpdate($copyDocId, new \Google\Service\Docs\BatchUpdateDocumentRequest([
                'requests' => $requests
            ]));

            // ✅ 3. CONVERT COPY TO PDF
            $pdfFile = $this->driveService->files->export($copyDocId, 'application/pdf', [
                'alt' => 'media'
            ]);

            // ✅ 4. SAVE & RETURN PDF TO USER
            $pdfPath = storage_path('app/public/generated-document.pdf');
            file_put_contents($pdfPath, $pdfFile->getBody()->getContents());

            // ✅ 5. DELETE THE TEMPORARY GOOGLE DOC COPY
            $this->driveService->files->delete($copyDocId);

            return response()->download($pdfPath);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
