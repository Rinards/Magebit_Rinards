// Requirements:

// - On successful validation, a success message appears in the place of the form, as per design.
//    Advantages:
// - You can use Vue.Js, React or similar technologies.

document.addEventListener('DOMContentLoaded', (event) => {

   function validEmail() {
      // Comparing user input to regular expression. 
      const email = document.querySelector("#email").value;
      console.log(email);
      if (email === "") return 3;
      const pattern = /^(?:(?:[^<>()\[\]\\.,;:\s@"]+(?:\.[^<>()\[\]\\.,;:\s@"]+)*)|(?:".+"))@(?:(?:\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(?:(?:[a-zA-Z\-0-9]+\.)+([a-zA-Z]{2,})))$/;
      if (email.match(pattern)) {
         let domain_end = email.match(pattern);
         return ((domain_end[1] === "co") ? 2 : 0);
      }
      else return 1;
      // 1 - Invalid emial
      // 2 - Colombia email
      // 3 - No emial input
   }

   function validTOS() {
      const checkbox = document.querySelector("#tos");
      return (checkbox.checked ? 0 : 4)
      // 4 - Terms not accepted
   }
   function outputError(error) {
      removeError();
      let error_message;
      // Getting error message text;
      switch (error) {
         case 1:
            error_message = "Please provide a valid e-mail address";
            break;
         case 2:
            error_message = "We are not accepting subscriptions from Colombia";
            break;
         case 3:
            error_message = "Email address is required";
            break;
         case 4:
            error_message = "You must accept the terms and conditions";
            break;
      }
      // Creating error element
      let error_element = document.createElement("p");
      error_element.textContent = error_message;
      error_element.className = "error";
      // Styling for element
      error_element.style.padding = "5px 0";
      error_element.style.fontSize = "14px";
      error_element.style.color = "#ff4242";
      // Displaying error under input
      document.querySelector(".input").parentNode.insertBefore(error_element, document.querySelector(".input").nextSibling);
   }
   function removeError() {
      // If error exists, remove element
      if (document.querySelector(".error")) {
         document.querySelector(".error").remove();
      }
   }

   function validation() {
      // After first validation listen for click on ToS to remove the error
      document.querySelector("#tos").addEventListener("click", validation);
      email_btn.disabled = true;
      // Validate email
      let error = validEmail();
      if (error === 0) {
         // If email valid, validate ToS
         error = validTOS();
         if (error === 0) {
            removeError();
            document.querySelector("#email_btn").disabled = false;
         }
         else {
            outputError(error);
         }
      }
      else {
         // After incorrect email input listen for keys to validate while typing
         outputError(error);
         document.querySelector("#email").addEventListener("keyup", validation);
      }
   }

   // Disable submit button
   document.querySelector("#email_btn").disabled = true;
   // Event Listener for submit button - when user tries to press submit button, run validation
   document.querySelector("label[for='email_btn']").addEventListener("click", validation);
   // When user submits valid data display message
   let form = document.querySelector("#form");
   form.addEventListener("submit", (e) => {
      let div = document.querySelector(".content"),
         h1 = document.querySelector("h1"),
         h2 = document.querySelector("h2"),
         sub = document.querySelector(".subscribe"),
         icon = document.createElement("img");

      div.classList.add("success");
      h1.textContent = "Thanks for subscribing!";
      h2.textContent = "You have successfully subscribed to our email listing. Check your email for the discount code.";
      sub.remove();
      icon.classList.add("icon-cup");
      icon.src = "./images/cup.svg";
      div.prepend(icon);

   })

})