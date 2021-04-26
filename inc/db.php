<?php
// define ("HOST", "sql209.epizy.com");
// define ("USER", "epiz_27744667");
// define ("BAZA", "epiz_27744667_ard");
// define ("PASS", "hQ8Y7IXD");




define ("HOST", "127.0.0.1");
define ("USER", "root");
define ("BAZA", "ard");
define ("PASS", "");
global $connect;
$connect = new mysqli(HOST, USER, PASS, BAZA );
$connect->query("SET NAMES 'utf8' ");

function uved($text,$why,$tim)
{



?><style>
	
.toast {
    -ms-flex-preferred-size: auto;
    flex-basis: auto;
    max-width: none;
    font-size: revert;
    background-color: rgb(0 0 0 / 0%);
    background-clip: inherit;
    border: none;
    box-shadow: none;
    opacity: 0;
    border-radius: revert;
}
</style>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<div class="toast" role="alert" data-delay="<?=$tim?>000" data-autohide="true">

 <div class=" alert alert-<?=$why?>">
<?=$text?>
 </div> 
</div>

 <script>
$('.toast').toast('show');
</script><?php	
}





?>