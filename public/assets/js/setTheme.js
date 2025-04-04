/*
 * Force Light Mode Always
 */
let lHtml = document.documentElement;

// Always remove dark class
lHtml.classList.remove("dark");

// Clear any dark mode preference
localStorage.setItem("dashmixDarkMode", "off");

// Optional: block theme from running if needed
let rememberTheme = lHtml.classList.contains("remember-theme");

if (rememberTheme) {
  let colorTheme = localStorage.getItem("dashmixColorTheme");

  // Set Color Theme
  if (colorTheme) {
    let themeEl = document.getElementById("css-theme");

    if (themeEl && colorTheme === "default") {
      themeEl.parentNode.removeChild(themeEl);
    } else {
      if (themeEl) {
        themeEl.setAttribute("href", colorTheme);
      } else {
        let themeLink = document.createElement("link");

        themeLink.id = "css-theme";
        themeLink.setAttribute("rel", "stylesheet");
        themeLink.setAttribute("href", colorTheme);

        document
          .getElementById("css-main")
          .insertAdjacentElement("afterend", themeLink);
      }
    }
  }
}
