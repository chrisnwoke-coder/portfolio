document.querySelector(".php-email-form").addEventListener("submit", function (e) {
  e.preventDefault();

  let name = document.getElementById("name").value.trim();
  let email = document.getElementById("email").value.trim();
  let subject = document.getElementById("subject").value.trim();
  let message = document.querySelector("textarea[name='message']").value.trim();

  if (!name || !email || !subject || !message) {
      alert("All fields are required.");
      return;
  }

  if (!validateEmail(email)) {
      alert("Please enter a valid email address.");
      return;
  }

  this.submit(); // Submit the form if validation passes
});

function validateEmail(email) {
  const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return re.test(String(email).toLowerCase());
}
