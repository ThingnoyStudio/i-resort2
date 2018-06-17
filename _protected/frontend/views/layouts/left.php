<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

$projectname  = Yii::getAlias('@web/');

$script = <<< JS

		$(document).ready(function() {

		    // Javascript method's body can be found in assets/js/demos.js
		    // demo.initDashboardPageCharts();




		    //chec First load
		    // get current URL path and assign 'active' class

				/* tag a ตัวไหน มี path ตรงกับปัจจุบัน ให้เพิ่มคลาส active เข้าไปที่ li */
		    var pathnamef = window.location.pathname;
				var projectname = "$projectname";
		    $('.nav > li > a[href="' + pathnamef + '"]').parent().addClass('active');



		    // alert("__" + pathnamef + "__ : __" + pp + "__");
		    // alert(typeof pathnamef);
		    // alert(typeof pp);

				/* ถ้าเปิดหน้าแรก โหลดครั้งแรก */
		    if (pathnamef == projectname) {
		        $('#fdash').addClass('active');
		        // alert("matching")
		    } else {
		        // alert("notmatch")
		    }

				// $(function(){
				// 	$('#sidebar').delegate('a', 'click', function(e) {
	      //       e.preventDefault();
				// 			var ptext = $(this).find("p").text();
				// 	    document.getElementById("navbarbrand").textContent = ptext;
				// 	});
				// });




		    // $(function() {
		    //     /* เพิ่มฟังก์ชันที่จะเรียก Ajax เมื่อมีการคลิกลิงค์ที่อยู่ภายใต้ div ที่มี id="sidebar" */
		    //     $('#sidebar').delegate('a', 'click', function(e) {
		    //         e.preventDefault();
		    //         var link = this.href;
				//
		    //         var ptext = $(this).find("p").text();
		    //         document.getElementById("navbarbrand").textContent = ptext;
				//
		    //         /* ดึงเนื้อหาจากลิงค์ด้วย Ajax เมื่อผู้ใช้กดลิงค์ */
		    //         $.get(link, function(res) {
				// 					var parser      = new DOMParser ();
    		// 					var resDoc = parser.parseFromString (res, "text/html");
				// 					 // h = $.parseHTML(res);
				//
				// 					 // $('.content').html($(h).find('#mycontent').innerHTML());
				//
				//
				// 					// var resText = responseDoc.getElementById('mycontent')
				// 					// console.log (responseDoc.getElementsByTagName('div'));
				// 					// var As = $('a', responseDoc);
				// 					var po = resDoc.getElementById('mycontent');
				// 					// var poo = resDoc.getElementsByTagName("script");
				// 					// var pooResult = poo[1].innerHTML;
				// 					// console.log(res);
				// 					// alert(typeof res);
				//
		    //             /* อัพเดทเนื้อหาที่ได้จาก Ajax ไปที่ div ที่มี id="content" */
		    //             // $('#mycontent').html(po);
				// 						//
				// 						// $('#mybody').getElementsByTagName('script');
				// 						// eval(scripts[0]);
				//
				// 						// $('#mybody').find('script').each(function(){
				// 						//
				// 						// 	console.log(res);
				// 						// 	demo.initDashboardPageCharts();
				// 						//
				// 						//
				// 					  //    eval($(this).text());
				// 					  //  });
				//
		    //             /* หลังจากอัพเดทเนื้อหาเสร็จ เปลี่ยน URL ของเบราว์เซอร์ */
		    //             // window.history.replaceState(null, null, link);
		    //         },
				// 				'html'
				// 			);
		    //     });
		    // });


				// $('#mycontent').find("script").each(function(){
				// 	 eval($(this).text());
				//  });

		    // $(function(){
		    //     $('.nav li a').filter(function()
		    //     {
		    //       return this.href==location.href
		    //     }).parent().addClass('active').siblings().removeClass('active')
		    //     // $('.nav li a').click(function(){
		    //     //      $(this).parent().addClass('active').siblings().removeClass('active')
		    //     // })
		    //  })




		});


JS;
$this->registerJs($script, View::POS_LOAD, 'myOption'); ?>

<div class = "sidebar-wrapper" >
    <ul class = "nav" id = "sidebar" >
<?php
if (Yii::$app->user->isGuest){
?>

    <p> บุคคลทั่วไป </p>
    <li>
        <a href = "<?= Url::to(['site/index'])?>">
            <i class = "material-icons" > store </i>
            <p> หน้าแรก </p>
        </a>
    </li>
    <li>
        <a href = "<?= Url::to(['/room/index'])?>">
            <i class = "material-icons" > store </i>
            <p> ห้องพัก </p>
        </a>
    </li>

    <li>
        <a href = "<?= Url::to(['/food/index'])?>">
            <i class = "material-icons" >local_dining</i>
            <p> เมนูอาหาร </p>
        </a>
    </li>
    <li>
        <a href = "<?= Url::to(['/promotion/index'])?>">
            <i class = "material-icons" > stars </i>
            <p> โปรโมชั่น </p>
        </a>
    </li>
    <li>
        <a href = "<?= Url::to(['/news/index'])?>">
            <i class = "material-icons" > stars </i>
            <p> ข่าวสาร </p>
        </a>
    </li>



    <?php
}else{
?>
<!--    อยากเช็คสถานะของุ้ใช้งานเพื่อแสดงหรือซ้อนบางอัน-->

    <p> สมาชิก </p>
    <li>
        <a href = "<?= Url::to(['site/index'])?>">
            <i class = "material-icons" > store </i>
            <p> หน้าแรก </p>
        </a>
    </li>
    <li>
        <a href = "<?= Url::to(['/room/index'])?>">
            <i class = "material-icons" > store </i>
            <p> ห้องพัก </p>
        </a>
    </li>


        <li>
            <a href = "<?= Url::to(['/food/index'])?>">
                <i class = "material-icons" >local_dining</i>
                <p> เมนูอาหาร </p>
            </a>
        </li>
        <li>
            <a href = "<?= Url::to(['/promotion/index'])?>">
                <i class = "material-icons" > stars </i>
                <p> โปรโมชั่น </p>
            </a>
        </li>
    <li>
        <a href = "<?= Url::to(['/news/index'])?>">
            <i class = "material-icons" > stars </i>
            <p> ข่าวสาร </p>
        </a>
    </li>

    <li>
        <a href = "<?= Url::to(['/booking/index'])?>">
            <i class = "material-icons" > store </i>
            <p> การจองห้องพัก </p>
        </a>
    </li>



    <p> พนักงานต้อนรับ </p>
    <li>
        <a href = "<?= Url::to(['/users/index'])?>">
            <i class = "material-icons" > stars </i>
            <p> จัดการข้อมูลลูกค้า </p>
        </a>
    </li>
    <li>
        <a href = "<?= Url::to(['/booking/index'])?>">
            <i class = "material-icons" > store </i>
            <p> การจองห้องพัก </p>
        </a>
    </li>

    <p> ผู้บริหาร </p>
    <li>
        <a href = "<?= Url::to(['/users/index'])?>">
            <i class = "material-icons" > stars </i>
            <p> รายงานการเข้าพัก </p>
        </a>
    </li>
    <li>
        <a href = "<?= Url::to(['/users/index'])?>">
            <i class = "material-icons" > stars </i>
            <p> รายงานค่าเช่าห้องพัก  </p>
        </a>
    </li>
    <li>
        <a href = "<?= Url::to(['/users/index'])?>">
            <i class = "material-icons" > stars </i>
            <p> รายงานค่าการทำอาหาร  </p>
        </a>
    </li>

    <?php
} //else
?>

   </ul>
</div>
