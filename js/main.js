function main() {
  var l = window.location.href;
  var arr = l.split('/');
  var current = arr[arr.length-1];
  console.log(current);

  if (current == "index.html") {
    home = document.getElementById('home');
    home.className = 'active';
  } else if (current == "products.html") {
    packages = document.getElementById('products');
    packages.className = 'active';
  } else if (current == "contact.html") {
    contact = document.getElementById('contact');
    contact.className = 'active';
  } else if (current == "claim.html") {
    guide = document.getElementById('claim');
    guide.className = 'active';
  } else if (current == "aboutus.html") {
    team = document.getElementById('aboutus');
    team.className = 'active';
  } else if (current == "") {

  }
}

main();
