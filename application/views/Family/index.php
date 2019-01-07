<br>
<div class='row'>
    <!-- for parent node -->
        <div class="col-lg-4">
            <img src="<?php echo base_url(); ?>/assets/images/members/<?php echo $Self['member_image']; ?>" width='200' hight='200' class='img img-thumbnail'>
        </div>
        
        <div class="col-lg-4">
        <br><br>
            <div class="container">
                <div>Name</div>
                <div>Date of Bitrh</div>
                <div>Email Address</div>
                <div>Mobile Number</div>
            </div>
        </div>
        <div class="col-lg-4">
        <br><br>
            <div class="container">
                <?php
                $gender='Mr';
                if($Self['member_gender']==='Female')
                    $gender='Mrs'
                ?>
                <div><?php echo $gender;  ?>.<?php echo $Self['member_name']; ?></div>
                <div><?php echo $Self['member_dob'];  ?></div>
                <div><?php echo $Self['member_email']; ?></div>
                <div><?php echo $Self['member_mobile'] ?></div>
            </div>
        </div>
</div>
<hr height='10'>
<br>
<div class="container">
    <table class=" table table-responsive" border=0>
        <tr> 
        <?php
        foreach($Family as  $Family){
            $c=1;
            $member_id=$Family['member_id'];
            $family_id=$Family['family_id'];
            if($c==4){echo "</tr><tr>";}
            echo "<td><img base=".base_url()." member_id=$member_id family_id=$family_id src=".base_url()."/assets/images/members/".$Family['member_image']." width='100' height='100' class='member img img-responsive'><br>".$Family['member_name']." (".$Family['member_relation'].")</td>";
            $c=$c+1;
        } ?>
    </table>
</div>
<script>
$('.member').on('click',e=>{
var url = e.target.attributes[0].value.toString();
var member_id = e.target.attributes[1].value
var family_id = e.target.attributes[2].value
console.log(url,member_id,family_id);

window.location.replace(`${url}MemberProfile/${member_id}/${family_id}`);
})
</script>
    <!-- for child nodes -->
