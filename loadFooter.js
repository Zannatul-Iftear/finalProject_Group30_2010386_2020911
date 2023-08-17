fetch('footer.html')
  .then(response => response.text())
  .then(data => {
    const navbarPlaceholder = document.getElementById('footerPlaceholder');
    navbarPlaceholder.innerHTML = data;
  });
