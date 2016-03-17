# PHP Object test

Create the base class

1. Create a class called `PersonBase`
2. Define an `age` class variable with `public` visibility and no default value
3. Define a `height` class variable with `private` visibility and a default value of `0`
4. Add a `public` method called `addHeight` that accepts an `inches` parameter. This method will increment the `height` class variable by the number of `inches` provided.
5. Add a `private` method called `getHeight` that returns the value of the `height` class variable. If the `variable` is set to `0` throw an exception with an error message.
6. Add a `public` method called `setRandomAge` that sets the `age` class variable to a random number between 18 and 90
7. Add a `public` method called `saySomething`. This method will make an API call to the following JSON API and return the text of the response. `https://baconipsum.com/api/?type=all-meat&sentences=1&start-with-lorem=1`

Create a second class

1. Create a class called `Person` that extends the `PersonBase` class
2. Override the `saySomething` method from the parent class. Get the text returned by the inherited method, reverse the string and then return it.
