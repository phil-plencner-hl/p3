## P3 Peer Review

+ Reviewer's name: Phil Plencner 
+ Reviwee's name: Gary H.
+ URL to Reviewe's P3 Github Repo URL: *<https://github.com/tealuxe/p3>*

## 1. Interface
The interface is very clean and simple to understand. I liked the use of background color to help make the text pop and made it very easy to read. The introductory text helped me to understand what Body Surface Area is and why we would want to calculate it. Overall, it is very sharp and I like it.

The form itself makes sense. All the fields work as intended and it looks good on my laptop.  However, on my phone the labels are pushed over to the right side and no longer line up with their associated fields.

When submitting the form, the message that appears overall looks good, however there seems to be some extra space between the end of the message and the bottom border that could use some tightening up. I would have also liked to have a &ldquo;reset&rdquo; button on the form so I could start fresh to put in new data.

## 2. Functional testing
+ I tried submitting the form without filling out any of the fields. It highlighted to me each field that was required in a red box. This drew my attention and informed me what was incorrect about my submission.
+ I tried filling out &ldquo;ABC&rdquo; in the **Body Weight** field and the browser returned an error message, but not the Laravel app itself (likely because the field type is number). This was a little confusing as I expected the validation message to be in the red box below the form. In fact, if I did not fill out any of the fields and submitted the form, then filled in &ldquo;ABC&rdquo; in the **Body Weight** field and submitted the form again the original validation messages still appeared and the browser message also appeared. Since the messages were in two different locations it was a little jarring.
+ A similar experience occurred when I entered &ldquo;125.5&rdquo; in the **Body Weight** field. The browser validation message appeared instead of Laravel validation. Similarly, this happens when I put a negative number into the field.
+ I was able to enter &ldquo;4 pounds&rdquo; in the **Body Weight** field and &ldquo;1 Feet 1 Inch&rdquo; in the Height fields and it calculated the results correctly. I also entered &ldquo;50000 pounds&rdquo; into the **Body Weight** field and it calculated the results correctly.  However, these examples are a little bit unreasonable sizes for a human, so I'm wondering if additional validation would be helpful to make sure someone is putting in realistic data. 
+ When I filled out reasonable data within the validation rules of the fields, the application worked great and I saw accurate calculations.

## 3. Code: Routes
There are two routes in the `routes/web.php` file. They both reference specific methods in the __CalculateController__. This looks great, and I don't see any need for changes in this file.

## 4. Code: Views
+ Template inheritance is used. There is a master Blade file that contains the __<head>__ as well as the beginning and ending __<body>__ and __<html>__ tags. The main content is in the welcome Blade file and is defined as a __content__ section. I would have liked to have additional header and footer blade files to flesh out the page a little more.
+ Overall the logic in the view files are based around how the data is displayed. There does not appear to be any logic that should be in a controller instead. It is very easy to read and understand.
+ Everything in the view files use Blade. It was unclear to me if the **round** function is actually Blade or PHP. Perhaps this should be done inside a controller instead of the view?

## 5. Code: General
+ I ran the url through the __W3C HTML Validator__ and it returned no errors. The HTML is valid.
+ Overall the code is very easy to understand. I was able to follow along with the logic and I could easily understand how it works.
+ I thought it was cool that basketballs were chosen an an object to relate to the Body Surface Area. It is a fun real world visualization.

## 6. Misc
Overall, this is a great project. It fulfills all the requirements of the project. The purpose of the app was very apparent and it would be something I'd actually use. I would give this project a passing grade. Great job!
