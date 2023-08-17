fetch('navbar.html')
  .then(response => response.text())
  .then(data => {
    const navbarPlaceholder = document.getElementById('navbarPlaceholder');
    navbarPlaceholder.innerHTML = data;

    // Load the navigation script
    const script = document.createElement('script');
    script.src = 'navbar.js';
    document.body.appendChild(script);
  });

