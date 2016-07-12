<?php
/*
Template Name: mail-contact
*/


get_header(); ?>




<form class="form" method="POST" action="/mail-contact-check">







    ----------------
    <ul class="privacy-te-bottom">
        <li><input name="q1" id="la1" type="radio" class="validate-doi required"><label for="la1">同意する</label></li>
        <li><input name="q1" id="la2" type="radio"><label for="la2">同意しない</label></li>
    </ul>
    ----------------<br>
    <button class="b-normal" type="submit">決定</button>

</form>

<?php get_footer(); ?>