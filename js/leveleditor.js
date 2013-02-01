var line = new Array();
for(var i=0;i<19;i++)
{
  line[i]   = new Array();
}


line[0] = [15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15];
line[1] = [15,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,15];
line[2] = [15,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,15];
line[3] = [15,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,15];
line[4] = [15,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,15];
line[5] = [15,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,15];
line[6] = [15,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,15];
line[7] = [15,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,15];
line[8] = [15,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,15];
line[9] = [15,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,15];
line[10] = [15,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,15];
line[11] = [15,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,15];
line[12] = [15,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,15];
line[13] = [15,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,15];
line[14] = [15,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,15];
line[15] = [15,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,15];
line[16] = [15,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,15];
line[17] = [15,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,15];
line[18] = [15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15];
function getMousePos(canvas, evt) {
        var rect = canvas.getBoundingClientRect();
        return {
          x: evt.clientX - rect.left,
          y: evt.clientY - rect.top
        };
      }

var brush_x=1;
var brush_y=19;

var bgeImage = new Image();
var selectionImage = new Image();
requiredInfotrons  = 0;

bgeImage.src = "img/leveleditor.png";
selectionImage.src = "img/editor_selection.png";

var activeImage = new Image();
activeImage.src = "img/editor_active.png";


var canvas = document.createElement("canvas");
canvas.style.cssText="idtkscale:ScaleAspectFit;";  // CocoonJS extension

var ctx = canvas.getContext("2d");
canvas.width = 1024;
canvas.height = 768;

document.body.appendChild(canvas);

var xCoor;
var yCoor;
var mouseIsDown=0;

var brush=0;

var keysDown = {};

addEventListener("keydown", function (e) {
  keysDown[e.keyCode] = true;
}, false);

addEventListener("keyup", function (e) {
  delete keysDown[e.keyCode];
}, false);

canvas.addEventListener('mousemove', function(evt) {
var mousePos = getMousePos(canvas, evt);
        xCoor=mousePos.x;
        yCoor=mousePos.y;
  }, false);

canvas.addEventListener('mousedown', function(evt) {
      mouseIsDown=1;
  }, false);

canvas.addEventListener('mouseup', function(evt) {
  mouseIsDown=0;
},false);

// Draw everything
var render = function () {

  if(mouseIsDown==1)
  {
    var lx = Math.round(Math.floor(xCoor/32));
    var ly = Math.round(Math.floor(yCoor/32));
    if(lx<=30&&lx>=1&&ly>=1&&ly<=17)
    {line[ly][lx]=brush;}
    else if(ly==19&&lx<15)
    {
      switch (lx)
      {
        case 1: {brush=1;break;}
        case 2: {brush=2;break;}
        case 3: {brush=3;break;}
        case 4: {brush=7;break;}
        case 5: {brush=5;break;}
        case 6: {brush=6;break;}
        case 7: {brush=4;break;}
        case 8: {brush=8;break;}
        case 9: {brush=9;break;}
        default: {brush=0;break;}
      }
      brush_y=ly;brush_x=lx;
    }
    else if(ly==20&&lx<15)
    {
      switch (lx)
      {
        case 1 : {brush=15;break}
        case 2 : {brush=16;break}
        case 3 : {brush=17;break}
        case 4 : {brush=18;break}
        case 5 : {brush=19;break}
        case 6 : {brush=20;break}
        case 7 : {brush=21;break}
        case 8 : {brush=22;break}
        case 9 : {brush=23;break}
        case 10:  {brush=24;break}
        case 11: {brush=25;break}
        default: {brush=0;break;}
      }
      brush_y=ly;brush_x=lx;
    }
    else if(ly==21&&lx<15)
    {
      switch (lx)
      {
        case 1 : {brush=10;break}
        case 2 : {brush=11;break}
        case 3 : {brush=12;break}
        case 4 : {brush=13;break}
        case 5 : {brush=14;break}
        case 6 : {brush=31;break}
        default: {brush=0;break;}
      }
      brush_y=ly;brush_x=lx;
    }
    else if(ly==21&&(lx==27||lx==28))
      {requiredInfotrons++;mouseIsDown=0;}
    else if(ly==22&&(lx==27||lx==28))
      {if(requiredInfotrons>0){requiredInfotrons--;mouseIsDown=0;}}

    else
    {mouseIsDown=0;document.getElementById("array").innerHTML=getLevel();}
  }
  ctx.drawImage(bgeImage, 0, 0);
if(48 in keysDown) {brush=0;} 
  if(49 in keysDown) {brush=1;} 
  if(50 in keysDown) {brush=2;} 
  if(51 in keysDown) {brush=3;} 
  if(52 in keysDown) {brush=4;} 
  if(53 in keysDown) {brush=5;} 
  if(54 in keysDown) {brush=6;} 
  //if(55 in keysDown) {brush=7;} 
  //if(56 in keysDown) {brush=8;} 
  if(57 in keysDown) {brush=9;} 

   
  


  for(var i=0;i<19;i++)
  {
    for(var j=0;j<32;j++)
    {
      switch (line[i][j])
      {
        case 1: {ctx.drawImage(baseImage, j*32,i*32);break;}
        case 2: {ctx.drawImage(terminalImage, j*32,i*32);break;}
        case 3: {ctx.drawImage(exitImage, j*32,i*32);break;}
        case 4: {ctx.drawImage(o_diskImage, j*32,i*32);break;}
        case 5: {ctx.drawImage(zonkImage, j*32,i*32);break;}
        case 6: {ctx.drawImage(infotronImage, j*32,i*32);break;}
        case 7: {ctx.drawImage(y_diskImage, j*32,i*32);break;}
        case 8: {ctx.drawImage(r_diskImage, j*32,i*32);break;}
        case 9: {ctx.drawImage(murphyImage, j*32,i*32);break;}
        case 10: {ctx.drawImage(chip1Image, j*32,i*32);break;}
        case 11: {ctx.drawImage(chip2Image, j*32,i*32);break;}
        case 12: {ctx.drawImage(chip3Image, j*32,i*32);break;}
        case 13: {ctx.drawImage(chip4Image, j*32,i*32);break;}
        case 14: {ctx.drawImage(chip5Image, j*32,i*32);break;}
        case 15: {ctx.drawImage(hw1Image, j*32,i*32);break;}
        case 16: {ctx.drawImage(hw2Image, j*32,i*32);break;}
        case 17: {ctx.drawImage(hw3Image, j*32,i*32);break;}
        case 18: {ctx.drawImage(hw4Image, j*32,i*32);break;}
        case 19: {ctx.drawImage(hw5Image, j*32,i*32);break;}
        case 20: {ctx.drawImage(hw6Image, j*32,i*32);break;}
        case 21: {ctx.drawImage(hw7Image, j*32,i*32);break;}
        case 22: {ctx.drawImage(hw8Image, j*32,i*32);break;}
        case 23: {ctx.drawImage(hw9Image, j*32,i*32);break;}
        case 24: {ctx.drawImage(hw10Image, j*32,i*32);break;}
        case 25: {ctx.drawImage(hw11Image, j*32,i*32);break;}
        case 31: {ctx.drawImage(bug_5Image, j*32,i*32);break;}

      }

    }
  }

  var lx = Math.round(Math.floor(xCoor/32));
  var ly = Math.round(Math.floor(yCoor/32));
  if(lx<=30&&lx>=1&&ly>=1&&ly<=17)
  {ctx.drawImage(selectionImage, ((lx+1)*32)-32,((ly+1)*32)-32);}

  ctx.drawImage(activeImage, brush_x*32, brush_y*32);
  ctx.textAlign = "center";
  ctx.fillStyle = "#ee0";
  ctx.font = "24px Helvetica";
  ctx.fillText(requiredInfotrons, 30*32-2, 22*32+7);


};

// The main game loop
var main = function () {
  var now = Date.now();
  var delta = now - then;
  render();
  then = now;
  timeDelay=Date.now();
};

// Let's play this game!
var then = Date.now();
setInterval(main, 1); // Execute as fast as possible
  
//________________________  ADDON FUNCTIONS

var getLevel = function()
{
  var totalInfotrons=0;
  for(var i=0;i<19;i++)
  {
    for(var j=0;j<32;j++)
    {
      if(line[i][j]==6)
      {totalInfotrons++;}
    }
  }

  if(totalInfotrons<requiredInfotrons)
    {
      requiredInfotrons=totalInfotrons;
    }

  var levelText="requiredInfotrons  = "+requiredInfotrons+";<br/>";;

  for(var i=0;i<19;i++)
  {
    levelText+=('line['+i+'] = ['+line[i].join(',')+'];'+'<br/>'); 
  }

  var currentTime = new Date()
  var month = currentTime.getMonth() + 1
  var day = currentTime.getDate()
  var year = currentTime.getFullYear()

  levelText+='// Generated with level editor: http://anrijs.jargans.com/murphy/editor.html <br/>';
  levelText+='// Date:' + day + "." + month + "." + year;

  return levelText;

}

