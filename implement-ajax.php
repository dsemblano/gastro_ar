<?php get_header(); ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" ></script>
<script type="text/javascript">
$(function()
{
$('#main_cat').change(function()
{
    var $mainCat=$('#main_cat').val();

    // call ajax
    $("#sub_cat").empty();
    $.ajax
    (
        {
            url:"<?php bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",     
            type:'POST',
            data:'action=my_special_ajax_call&main_catid=' + $mainCat,

            success:function(results)
            {
                //  alert(results);
                $("#sub_cat").removeAttr("disabled");       
                $("#sub_cat").append(results);  
            }
        }
    );                                    
});
});
</script>               
<style type="text/css">
#content{width:auto; height:400px; margin:50px;}
</style>

<div id="content">
<?php 
 wp_dropdown_categories('show_count=0&selected=-1&hierarchical=1&depth=1&hide_empty=0&exclude=1&show_option_none=Main Categories&name=main_cat&taxonomy=state');
?>
<select name="sub_cat" id="sub_cat" disabled="disabled"></select>
</div>
<?php
get_footer();
?>
