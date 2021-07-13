<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FOOODS</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="jqui/jquery-ui.min.css">
<script src="jqui/jquery-ui.min.js"></script>
</head>
<style>
    .text {
        width: 100%;
    }
</style>
<body>  
    <form id="add_food" name="add_food" action="submit.php" type="post">
        <table>
            <tr>
                <td><i>Item</i></td>
                <td><input type="text" id="item" name="item" autocomplete='off'></td>
            </tr>
            <tr>
                <td><i>Brand</i></td>
                <td><input type="text" id="brand" name="brand" autocomplete='off'></td>
            </tr>
            <tr>
                <td><i>Size</i></td>
                <td><input type="text" id="size" name="size" autocomplete='off'></td>
            </tr>
            <tr>
                <td><i>Weight</i></td>
                <td><input type="text" id="weight" name="weight" autocomplete='off'></td>
            </tr>
            <tr>
                <td><i>Quantity</i></td>
                <td><input type="text" id="qnty" name="qnty" autocomplete='off'></td>
            </tr>
            <tr>
                <td><i>Department</i></td>
                <td><input type="text" id="dept" name="dept" autocomplete='off'></td>
            </tr>
            <tr>
                <td><i>Item Cost</i></td>
                <td><input type="text" id="item_cost" name="item_cost" autocomplete='off'></td>
            </tr>
        </table>
        <table>
            <tr>
                <td><i>Date</i></td>
                <td><input type="text" id="date" name="date" autocomplete='off'></td>
            </tr>
            <tr>
                <td><i>Location</i></td>
                <td><input type="text" id="location" name="location" autocomplete='off'></td>
            </tr>
            <tr>
                <td><i>Cost</i></td>
                <td><input type="text" id="cost" name="cost" autocomplete='off'></td>
            </tr>
            <tr>
                <td><i>Amount Saved</i></td>
                <td><input type="text" id="saved" name="saved" autocomplete='off'></td>
            </tr>
            <tr>
                <td><i>Transaction ID</i></td>
                <td><input type="text" id="transid" name="transid" autocomplete='off'></td>
            </tr>
            <tr>
                <td><i>Create Transaction</i></td>
                <td><input type="checkbox" id="is_trans" name="is_trans" autocomplete='off'></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" id="sub"></td>
            </tr>
        </table>           
    </form>       
    <div id="return_gp"></div>
    <div id="completed"></div>
    <hr>
    <div id="tables"></div>
</body>

<script type='text/javascript'>

function DocumentReady() {
    $("#date").keyup(function(){
        $.ajax({
            type: "POST",
            url: "trans.php",
            data: 'keyword='+$(this).val(),
            success: function(data) {
                $("#return_gp").html(data);
            }
        });
    });

    $("#add_food").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.

        var form = $(this);
        var url = form.attr('action');

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            success: function(data)
            {
                $("#completed").html("Submitted... " + data);
                $.ajax({
                    type: "POST",
                    url: "tables.php",
                    success: function(data) {
                        $("#tables").html(data);
                    }
                });
            }
        });

        
    });
    
    $(function() {
        $("#item").autocomplete({
            source: "autoc.php"+document.getElementById("item").value,
            minLength: 0,
            autoFocus: true
        });
    });
    $(function() {
        $("#brand").autocomplete({
            source: "brand.php"+document.getElementById("brand").value,
            minLength: 0,
            autoFocus: true
        });
    });
    $(function() {
        $("#size").autocomplete({
            source: "size.php"+document.getElementById("size").value,
            minLength: 0,
            autoFocus: true
        });
    });
    $(function() {
        $("#weight").autocomplete({
            source: "weight.php"+document.getElementById("weight").value,
            minLength: 0,
            autoFocus: true
        });
    });
    $(function() {
        $("#qnty").autocomplete({
            source: "qnty.php"+document.getElementById("qnty").value,
            minLength: 0,
            autoFocus: true
        });
    });
    $(function() {
        $("#dept").autocomplete({
            source: "dept.php"+document.getElementById("dept").value,
            minLength: 0,
            autoFocus: true
        });
    });

    $(document).ready(function(){
        $.ajax({
            type: "POST",
            url: "tables.php",
            success: function(data) {
                $("#tables").html(data);
            }
        });
    });

}
$(document).ready(DocumentReady);
</script>
</html>