# Form submission test

1. Create an HTML form with the following elements
    * First Name
    * Last Name
    * Email Address
    * Submit button
2. Make the form submitable via AJAX
3. Save the data to a MySQL database table
4. Email the result of the submitted form to an email address with the Postmark API

The Postmark API documentation is [located here](http://developer.postmarkapp.com/developer-build.html). You can use raw PHP or one of the many [PHP libraries](http://developer.postmarkapp.com/developer-libs.html#php-5).

Your Postmark API key is `bcaa4d98-c097-4390-a628-aec62160103d`

The `from` address of the email should be `test@perk.com` or the Postmark API won't allow you to send.