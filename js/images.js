function preloadImages(array) {
    if (!preloadImages.list) {
        preloadImages.list = [];
    }
    for (var i = 0; i < array.length; i++) {
        var img = new Image();
        img.src = array[i];
        preloadImages.list.push(img);
    }
}

var imageURLs = [
"img/background.png",
"mg/base.png",
"img/terminal.png",
"img/murphy.png",
"img/exit.png",
"img/zonk.png",
"img/infotron.png",
"img/hw1.png",
"img/hw2.png",
"img/hw3.png",
"img/hw4.png",
"img/hw5.png",
"img/hw6.png",
"img/hw7.png",
"img/hw8.png",
"img/hw9.png",
"img/hw10.png",
"img/hw11.png",
"img/chip1.png",
"img/y_disk.png",
"img/o_disk.png",
"img/r_disk.png",
"img/explosion_1.png",
"img/explosion_2.png",
"img/explosion_3.png",
"img/explosion_4.png",
"img/explosion_5.png",
"img/explosion_6.png",
"img/explosion_7.png",
"img/murphy_right_0.png",
"img/murphy_right_1.png",
"img/murphy_right_2.png",
"img/murphy_left_0.png",
"img/murphy_left_1.png",
"img/murphy_left_2.png",
"img/zonk_roll_1.png",
"img/zonk_roll_2.png",
"img/zonk_roll_3.png",
"img/infotron_roll_1.png",
"img/infotron_roll_2.png",
"img/infotron_roll_3.png",
"img/infotron_roll_4.png",
"img/infotron_roll_5.png",
"img/infotron_roll_6.png",
"img/infotron_roll_7.png",
"img/murphy_push_left.png",
"img/murphy_push_right.png",
"img/exit_1.png",
"img/exit_2.png",
"img/exit_3.png",
"img/exit_4.png",
"img/exit_5.png",
"img/exit_6.png",
"img/exit_7.png",
"img/logo.png",
"img/selector.png"
];

//preloadImages(imageURLs);

var bgImage = new Image();
bgImage.src = "img/background.png";

var baseImage = new Image();     
baseImage.src = "img/base.png";     

var terminalImage = new Image(); 
terminalImage.src = "img/terminal.png";  

var murphyImage = new Image();   
murphyImage.src = "img/murphy.png";   

var exitImage = new Image();     
exitImage.src = "img/exit.png";   

var zonkImage = new Image();     
zonkImage.src = "img/zonk.png";   

var infotronImage = new Image(); 
infotronImage.src = "img/infotron.png";     

var hw1Image = new Image();      
hw1Image.src = "img/hw1.png"; 

var hw2Image = new Image();
hw2Image.src = "img/hw2.png";

var hw3Image = new Image();
hw3Image.src = "img/hw3.png";

var hw4Image = new Image();
hw4Image.src = "img/hw4.png";

var hw5Image = new Image();
hw5Image.src = "img/hw5.png";

var hw6Image = new Image();
hw6Image.src = "img/hw6.png";

var hw7Image = new Image();
hw7Image.src = "img/hw7.png";

var hw8Image = new Image();
hw8Image.src = "img/hw8.png";

var hw9Image = new Image();
hw9Image.src = "img/hw9.png";

var hw10Image = new Image();
hw10Image.src = "img/hw10.png";

var hw11Image = new Image();
hw11Image.src = "img/hw11.png";

var chip1Image = new Image();
chip1Image.src = "img/chip1.png";

var chip2Image = new Image();
chip2Image.src = "img/chip2.png";

var chip3Image = new Image();
chip3Image.src = "img/chip3.png";

var chip4Image = new Image();
chip4Image.src = "img/chip4.png";

var chip5Image = new Image();
chip5Image.src = "img/chip5.png";

var y_diskImage = new Image();
y_diskImage.src = "img/y_disk.png";

var o_diskImage = new Image();
o_diskImage.src = "img/o_disk.png";

var r_diskImage = new Image();
r_diskImage.src = "img/r_disk.png";

var explosion_1Image = new Image();
explosion_1Image.src = "img/explosion_1.png";     

var explosion_2Image = new Image();
explosion_2Image.src = "img/explosion_2.png";     

var explosion_3Image = new Image();
explosion_3Image.src = "img/explosion_3.png";     

var explosion_4Image = new Image();
explosion_4Image.src = "img/explosion_4.png";     

var explosion_5Image = new Image();
explosion_5Image.src = "img/explosion_5.png";     

var explosion_6Image = new Image();
explosion_6Image.src = "img/explosion_6.png";     

var explosion_7Image = new Image();
explosion_7Image.src = "img/explosion_7.png";     


var murphy_right_0Image = new Image();
murphy_right_0Image.src = "img/murphy_right_0.png";

var murphy_right_1Image = new Image();
murphy_right_1Image.src = "img/murphy_right_1.png";

var murphy_right_2Image = new Image();
murphy_right_2Image.src = "img/murphy_right_2.png";

var murphy_left_0Image = new Image();
murphy_left_0Image.src = "img/murphy_left_0.png";

var murphy_left_1Image = new Image();
murphy_left_1Image.src = "img/murphy_left_1.png";

var murphy_left_2Image = new Image();
murphy_left_2Image.src = "img/murphy_left_2.png";

var zonk_roll_1Image = new Image();
zonk_roll_1Image.src = "img/zonk_roll_1.png";

var zonk_roll_2Image = new Image();
zonk_roll_2Image.src = "img/zonk_roll_2.png";

var zonk_roll_3Image = new Image();
zonk_roll_3Image.src = "img/zonk_roll_3.png";


var infotron_roll_1Image = new Image();
infotron_roll_1Image.src = "img/infotron_roll_1.png";

var infotron_roll_2Image = new Image();
infotron_roll_2Image.src = "img/infotron_roll_2.png";

var infotron_roll_3Image = new Image();
infotron_roll_3Image.src = "img/infotron_roll_3.png";

var infotron_roll_4Image = new Image();
infotron_roll_4Image.src = "img/infotron_roll_4.png";

var infotron_roll_5Image = new Image();
infotron_roll_5Image.src = "img/infotron_roll_5.png";

var infotron_roll_6Image = new Image();
infotron_roll_6Image.src = "img/infotron_roll_6.png";

var infotron_roll_7Image = new Image();
infotron_roll_7Image.src = "img/infotron_roll_7.png";

var murphy_push_leftImage = new Image();
murphy_push_leftImage.src = "img/murphy_push_left.png";

var murphy_push_rightImage = new Image();
murphy_push_rightImage.src = "img/murphy_push_right.png";

var exit_1Image = new Image();
exit_1Image.src = "img/exit_1.png";     

var exit_2Image = new Image();
exit_2Image.src = "img/exit_2.png";     

var exit_3Image = new Image();
exit_3Image.src = "img/exit_3.png";     

var exit_4Image = new Image();
exit_4Image.src = "img/exit_4.png";     

var exit_5Image = new Image();
exit_5Image.src = "img/exit_5.png";     

var exit_6Image = new Image();
exit_6Image.src = "img/exit_6.png";     

var exit_7Image = new Image();
exit_7Image.src = "img/exit_7.png";     

var logoImage = new Image();
logoImage.src = "img/logo.png";

var selectorImage = new Image();
selectorImage.src = "img/selector.png";

var bug_1Image = new Image();
bug_1Image.src = "img/bug_1.png";     

var bug_2Image = new Image();
bug_2Image.src = "img/bug_2.png";     

var bug_3Image = new Image();
bug_3Image.src = "img/bug_3.png";     

var bug_4Image = new Image();
bug_4Image.src = "img/bug_4.png";     

var bug_5Image = new Image();
bug_5Image.src = "img/bug_5.png";    

var splash_bugImage = new Image();
splash_bugImage.src = "img/splash_bug.png";    

var sniksnak_up_0Image = new Image();
sniksnak_up_0Image.src = "img/sniksnak_up_0.png";  

var sniksnak_up_1Image = new Image();
sniksnak_up_1Image.src = "img/sniksnak_up_1.png";     

var sniksnak_up_2Image = new Image();
sniksnak_up_2Image.src = "img/sniksnak_up_2.png";     

var sniksnak_up_3Image = new Image();
sniksnak_up_3Image.src = "img/sniksnak_up_3.png";


var sniksnak_down_0Image = new Image();
sniksnak_down_0Image.src = "img/sniksnak_down_0.png";  

var sniksnak_down_1Image = new Image();
sniksnak_down_1Image.src = "img/sniksnak_down_1.png";     

var sniksnak_down_2Image = new Image();
sniksnak_down_2Image.src = "img/sniksnak_down_2.png";     

var sniksnak_down_3Image = new Image();
sniksnak_down_3Image.src = "img/sniksnak_down_3.png";       

var sniksnak_left_0Image = new Image();
sniksnak_left_0Image.src = "img/sniksnak_left_0.png";  

var sniksnak_left_1Image = new Image();
sniksnak_left_1Image.src = "img/sniksnak_left_1.png";     

var sniksnak_left_2Image = new Image();
sniksnak_left_2Image.src = "img/sniksnak_left_2.png";     

var sniksnak_left_3Image = new Image();
sniksnak_left_3Image.src = "img/sniksnak_left_3.png";       

var sniksnak_right_0Image = new Image();
sniksnak_right_0Image.src = "img/sniksnak_right_0.png";  

var sniksnak_right_1Image = new Image();
sniksnak_right_1Image.src = "img/sniksnak_right_1.png";     

var sniksnak_right_2Image = new Image();
sniksnak_right_2Image.src = "img/sniksnak_right_2.png";     

var sniksnak_right_3Image = new Image();
sniksnak_right_3Image.src = "img/sniksnak_right_3.png";

var electrons_0Image = new Image();
electrons_0Image.src = "img/electrons_0.png"; 

var electrons_1Image = new Image();
electrons_1Image.src = "img/electrons_1.png";     

var electrons_2Image = new Image();
electrons_2Image.src = "img/electrons_2.png";     

var electrons_3Image = new Image();
electrons_3Image.src = "img/electrons_3.png";     

var electrons_4Image = new Image();
electrons_4Image.src = "img/electrons_4.png";     

var electrons_5Image = new Image();
electrons_5Image.src = "img/electrons_5.png";  

var electrons_6Image = new Image();
electrons_6Image.src = "img/electrons_6.png";

var electrons_7Image = new Image();
electrons_7Image.src = "img/electrons_7.png";

var infotron_explosion_1Image = new Image();
infotron_explosion_1Image.src = "img/infotron_explosion_1.png";     

var infotron_explosion_2Image = new Image();
infotron_explosion_2Image.src = "img/infotron_explosion_2.png";     

var infotron_explosion_3Image = new Image();
infotron_explosion_3Image.src = "img/infotron_explosion_3.png";     

var infotron_explosion_4Image = new Image();
infotron_explosion_4Image.src = "img/infotron_explosion_4.png";     

var infotron_explosion_5Image = new Image();
infotron_explosion_5Image.src = "img/infotron_explosion_5.png";     

var infotron_explosion_6Image = new Image();
infotron_explosion_6Image.src = "img/infotron_explosion_6.png";     

var infotron_explosion_7Image = new Image();
infotron_explosion_7Image.src = "img/infotron_explosion_7.png";     

var port_upImage = new Image();
port_upImage.src = "img/port_up.png";

var port_downImage = new Image();
port_downImage.src = "img/port_down.png";

var port_leftImage = new Image();
port_leftImage.src = "img/port_left.png";

var port_rightImage = new Image();
port_rightImage.src = "img/port_right.png";

var port_horizontalImage = new Image();
port_horizontalImage.src = "img/port_horizontal.png";

var port_verticalImage = new Image();
port_verticalImage.src = "img/port_vertical.png";

var port_allImage = new Image();
port_allImage.src = "img/port_all.png";