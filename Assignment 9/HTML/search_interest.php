<?php
require_once __DIR__ . '/header.php';
?>

    <h2> Search Form</h2>
        <br>
        <form action="sr_2.php" method="post">

            <label for="search">Interest:</label>
            <input type="text" name="search" id="interest_search" required placeholder="enter a sport:">
            <br>

            <script>
                $("#interest_search").autocomplete({
                    source: function(request, response) {
                        $.ajax({
                            url: "get_interest.php",
                            data: { q: request.term }, 
                            dataType: "json",
                            success: function(data) {
                                response(data);
                            }
                        });
                    }
                });
            </script>

            <input type="submit" value="Submit Form" />
        </form>
        <br>
        <a href="search.html">Back to Search Page</a><br>
        <a href="index.html">Back to Home Page</a><br>


<?php
require_once __DIR__ . '/footer.php';
?>