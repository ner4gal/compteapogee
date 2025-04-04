<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Client;
use Google\Service\Docs;
use Google\Service\Drive;
use App\Models\DoctoratInscription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DoctoratInscriptionController extends Controller
{
    public function store(Request $request)
    {
        // For testing, we're not performing validation here.
        $data = $request->all();

        // Store the data in the database using the DoctoratInscription model.
        // It is assumed that the user is authenticated.
        $user = Auth::user();
        $dataToStore = [
            'user_id'            => $user->id,
            'user_email'         => $user->email,
            'user_name'          => $user->name,
            'etbl'               => $data['etbl'],
            'ced'                => $data['ced'],
            'dateDM'             => $data['dateDM'],
            'nomPrenom'          => $data['nomPrenom'],
            'date1Ins'           => $data['date1Ins'],
            'CIN'                => $data['CIN'],
            'CNE'                => $data['CNE'],
            'tel'                => $data['tel'],
            'email'              => $data['email'],
            'NumApogee'          => $data['NumApogee'],
            'FormationDoctorale' => $data['FormationDoctorale'],
            'StructureRecherche' => $data['StructureRecherche'],
            'DirThese'           => $data['DirThese'],
            'aneINS'             => $data['aneINS'],
            'nrtDM'              => $data['nrtDM'],
            'mtf'                => $data['mtf'],
            // 'nom_demande' will use the default defined in the migration,
            // or you can override it here if needed.
        ];

        DoctoratInscription::create($dataToStore);

        // Initialize Google Client
        $client = new Client();
        $client->setAuthConfig(storage_path('google-docs-key.json'));
        $client->addScope([Docs::DOCUMENTS, Drive::DRIVE]);

        // Create Google Docs and Drive service objects.
        $docsService = new Docs($client);
        $driveService = new Drive($client);

        // ID of your Google Docs template
        $templateId = '1m4oOB_VWoe1z97C5_pwZKB5XGx5JOYgmU9RjsZnrI2E';

        // Create a copy of the template to work on
        $copyTitle = 'Doctorat Inscription - ' . time();
        $copiedFile = $driveService->files->copy($templateId, new \Google\Service\Drive\DriveFile([
            'name' => $copyTitle,
        ]));

        $documentId = $copiedFile->id;

        // Prepare a batchUpdate request to replace placeholders in the copied document.
        // Using request data directly.
        $requests = [];
        $placeholders = [
            '{{etbl}}'       => $data['etbl'],
            '{{ced}}'        => $data['ced'],
            '{{dateDM}}'     => $data['dateDM'],
            '{{nomPrenom}}'  => $data['nomPrenom'],
            '{{date1INS}}'   => $data['date1Ins'],
            '{{cin}}'        => $data['CIN'],
            '{{cne}}'        => $data['CNE'],
            '{{tes}}'        => $data['tel'],
            '{{email}}'      => $data['email'],
            '{{napogge}}'    => $data['NumApogee'],
            '{{formation}}'  => $data['FormationDoctorale'],
            '{{strtRch}}'    => $data['StructureRecherche'],
            '{{derctThese}}' => $data['DirThese'],
            '{{aneINS}}'     => $data['aneINS'],
            '{{nrtDM}}'      => $data['nrtDM'],
            '{{raiso}}'      => $data['mtf'],
        ];

        foreach ($placeholders as $placeholder => $replacement) {
            $requests[] = [
                'replaceAllText' => [
                    'containsText' => [
                        'text' => $placeholder,
                        'matchCase' => true,
                    ],
                    'replaceText' => $replacement,
                ],
            ];
        }

        // Execute the batch update.
        $batchUpdateRequest = new \Google\Service\Docs\BatchUpdateDocumentRequest([
            'requests' => $requests,
        ]);
        $docsService->documents->batchUpdate($documentId, $batchUpdateRequest);

        // Export the updated document as PDF.
        $pdfContent = $driveService->files->export($documentId, 'application/pdf', [
            'alt' => 'media',
        ]);

        // Optionally, delete the temporary document copy.
        $driveService->files->delete($documentId);

        // Save the PDF file to storage.
        $pdfPath = storage_path('app/public/doctorat-inscription.pdf');
        file_put_contents($pdfPath, $pdfContent->getBody()->getContents());

        // Return the PDF as a response for download.
        return response()->download($pdfPath);
    }
}
