<!DOCTYPE html>
<html lang="en" dir="ltr"
<head>
<meta charset="utf-8">
<title>Camagru</title>
</head>
<body>
<div class="">
<h3>Camagru<h3>
<form action="comments.php" method="post">
<center>
   <form method="post">
    <div class='wrapperr'>
        <div class='wrapper'>
    <div class='container'>
        <div class='top'>
            <div class='logo'></div>
            <div class='gray close'></div>
        </div>

        <div class='content'>
            <ul class='section'>
                <li class='header'></li>
                <li class='item right-label'>
                    <label for="title">Title</label>
                    <input type="text" placeholder='eg. Chocolate Chip  Cookies' id="title" class='shorter' />
                    <div class='picture-container'>
                        <div class='picture'></div>
                    </div>
                </li>
                <li class='item right-label'>
                    <label for="author">Author</label>
                    <input type="text" placeholder='eg. Julia Child (optional)' id="author" class='shorter' />
                </li>
                <li class='item right-label'>
                    <label for="adapted">Adapted</label>
                    <input type="text" placeholder='eg. The Joy of Cooking (optional)' id="adapted" class='shorter' />
                </li>
                <li class='item right-label'>
                    <label for="adapted-link">Adapt Link</label>
                    <input type="text" placeholder='  (optional)' id="adapted-link" class='shorter' />
                    <input type="button" class="button green box-shadow" value="Select Image" id="picture" />
                </li>
                <li class='item spaced right-label'>
                    <label for="summary" id="summary-label">Description</label>
                    <textarea placeholder='eg. A delicious drop cookie  (optional)' id="summary"></textarea>
                </li>
                  <li class='item right-label'>
                    <label for="prep-time">Prep Time</label><input  type="text" placeholder="HH:MM (optional)" id="prep-time" class="time" />
                    <label for="cook-time">Cook Time</label><input type="text" placeholder="HH:MM (optional)" id="cook-time" class="time" />
                    <label for="total-time">Total Time</label><input type="text" placeholder="HH:MM (optional)" id="total-time" class="time" />
                </li>
                <li class='item right-label'>
                    <label for="servings">Serves</label><input type="text" placeholder="Amount (optional)" id="servings" class="amount" />
                    <label for="yields">Yields</label><input type="text" placeholder="Amount (optional)" id="yields" class="amount" />
                </li>
                <li class='header new'></li>
                <li class='item'>
                    <label for="ingredients">Ingredients</label>
                    <textarea placeholder="One ingredient per line, include subheaders by ending with a colon (eg. For the cake:)" id="ingredients" class='larger'></textarea>
                </li>
                <li class='item'>
                    <label for="directions">Directions</label>
                    <textarea placeholder="One direction per line, include subheaders by ending with a colon (eg. For the cake:)" id="directions" class='larger'></textarea>
                </li>
                <li class='item'>
                    <label for="notes">Notes</label>
                    <textarea placeholder="One note per line, include subheaders by ending with a colon (eg. Great tip:) (optional)" id="notes" class='larger'></textarea>
                </li>
                <li class='header new error-list' style="display: none"></li>
                <li class='new error-data' style="display: none">
                    <ul class='error-ul'>
                        <li class='error-title' style="display: none">Please enter a title for the recipe.</li>
                        <li class='error-adapted-link' style="display: none">Please enter a valid url.</li>
                        <li class='error-prep-time' style="display: none">Please enter a prep time using HH:MM such as <b>1:15</b> for an hour and fifteen minutes or <b>25</b> for 25 minutes.</li>
                        <li class='error-cook-time' style="display: none">Please enter a cook time using HH:MM such as <b>1:15</b> for an hour and fifteen minutes or <b>25</b> for 25 minutes.</li>
                        <li class='error-total-time' style="display: none">Please enter a total time using HH:MM such as <b>1:15</b> for an hour and fifteen minutes or <b>25</b> for 25 minutes.</li>
                        <li class='error-servings' style="display: none">Please enter a number for the serves amount such as <b>4</b> for a recipe that makes 4 servings.</li>
                        <li class='error-yields' style="display: none">Please enter a number for the yields amount such as <b>18</b> for a recipe that makes 18 cookies.</li>
                        <li class='error-ingredients' style="display: none">Please enter some ingredients for your recipe.</li>
                    </ul>
                </li>
                <li class='new center'>
                    <input type="button" class='button green standard-button box-shadow' value='Save' id="save" />
                    <input type="button" class='button white standard-button box-shadow' value='Cancel' id="cancel" />
                    <div class='working'>
                        <div class='working-image'></div>
                        <div class='working-text'>Saving Recipe</div>
                    </div>
                </li>
            </ul>
           </div>
       </div>
        </div></center>
        </form>
</div>
</body>
</html>