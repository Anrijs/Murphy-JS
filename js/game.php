//
//
//  TODO:
// Red disk
// Snik-snak
// Thoose shiny things
// Ports
// BUGfix
// more bugFIX
//
//


<?php
$levelsAvaible=6;


$totalLevels = 6;
$levels = "";
$i=1;
while($i<$totalLevels+1)
{
  $j = 'level';
  if($i<10) {$j='level0';}
  $levels = $levels.'case '.$i.':{include("levels/'.$j.$i.'.js");break;}';
    $i++;
}
  echo "var totalLevels=".$totalLevels;
?>

 var version = 'Alpha v1.5pre1';

var murphy = [];
murphy.x=2;
murphy.y=2;
murphy.xoffset=0;
murphy.yoffset=0;
murphy.hit=0;
murphy.push=0;
murphy.infotrons=0;
murphy.disks=0;
murphy.win=0;
murphy.isPushing=0;
//include("js/loadlevel.js");
var collected = 0;
var murphy_pull = 0;
var newGame=0;
var timeDelay;
var murphy_move = 0;
var murphy_direction = 0;
var murphy_distance = 0;
var isLoaded = 0;
var murphy_lastside = 0;
var terminalBlow = 0;
var levelsAvaible = <?php echo $levelsAvaible;?> ;
var diskIsPlanted = 0;
var diskX=0;
var diskY=0;

var menuFrame = 0;

var errorMsg = "";

var xCoor;
var yCoor;

var gameLevel = 1;
var levelToLoad = 1;
var level_author = "unknown";
var level_name = "unknown";
var redDisks = 0;
var splashSize =32;
var diskDelay = 0;

var fallObj = function()
{
    this.id = 0;
    this.x = -1;
    this.y = -1;
    this.gravity = 0;
    this.isFalling = 0;
    this.isPushed = 0;
    this.fallDistance = 0;
    this.xoffset = 0;
    this.yoffset = 0;
    this.keepFalling = 0;
    this.preFall = 0;
}

var aiObj = function()
{
  this.id = 0;
  this.x = -1;
  this.y = -1;
  this.moveDistance = 0;
  this.xoffset = 0;
  this.yoffset = 0;
  this.direction = 1;
  this.move=0;
  this.turn=0;
}

var fallObject = [];
var aiObject = [];

//include("js/loadlevel.js");
var bsod=0;
var objCount;
var aiCount;

var line = [];
var requiredInfotrons  = 0;



var loadGame = function(levelID)
{
  //levelToLoad=levelID;
  isLoaded=0;
  diskDelay=0;
  diskIsPlanted=0;
   diskX=0;
 diskY=0;
  redDisks = 0;
  murphy.xoffset=0;
  murphy.yoffset=0;
  murphy.hit=0;
  murphy.push=0;
  murphy.infotrons=0;
  murphy.disks=0;
  murphy.win=0;
  murphy.isPushing=0;
  collected = 0;
  murphy_pull = 0;
  murphy_move = 0;
  murphy_direction = 0;
  murphy_distance = 0;
  terminalBlow = 0;
  level_author = "unknown";
  level_name = "unknown";
  errorMsg = "";
   
  loadLevel();
newGame=1;

}

var loadLevel = function ()
{
  switch (levelToLoad)
  {
  <?php echo $levels; ?>
  }

aiCount=0;
objCount=0;
for(var i=1;i<19;i++)
 {
   for(var j=0;j<32;j++)
   {
   // var lineId=line[i][j];
     switch (line[i][j])
     {
       case 4:  {
                  fallObject[objCount] = new fallObj;
                  fallObject[objCount].id=4;
                  fallObject[objCount].x=j;
                  fallObject[objCount].y=i;
                  fallObject[objCount].gravity=1;
                  objCount++;
                  break;
                }
       case 5:  {
                  fallObject[objCount] = new fallObj;
                  fallObject[objCount].id=5;
                  fallObject[objCount].x=j;
                  fallObject[objCount].y=i;
                  fallObject[objCount].gravity=1;
                  objCount++;
                  break;
                }
       case 6: 
                {
                  fallObject[objCount] = new fallObj;
                  fallObject[objCount].id=6;
                  fallObject[objCount].x=j;
                  fallObject[objCount].y=i;
                  fallObject[objCount].gravity=1;
                  objCount++;
                  break;
                }
        case 7: 
                {
                  fallObject[objCount] = new fallObj;
                  fallObject[objCount].id=7;
                  fallObject[objCount].x=j;
                  fallObject[objCount].y=i;
                  fallObject[objCount].gravity=0;
                  objCount++;
                  break;
                }
        case 9: 
                {
                  murphy.x=j+1;
                  murphy.y=i+1;
                  break;
                }
        case 27:
                {
                  aiObject[aiCount] = new aiObj;
                  aiObject[aiCount].id = 27;
                  aiObject[aiCount].x = j;
                  aiObject[aiCount].y = i;
                  aiCount++;
                  break;
                }
     }
   }
 }
 isLoaded=1;

}

var canvas = document.createElement("canvas");
canvas.style.cssText="idtkscale:ScaleAspectFit;";  // CocoonJS extension

var ctx = canvas.getContext("2d");
canvas.width = 1024;
canvas.height = 768;

document.body.appendChild(canvas);


 //Create the canvas

var moveSpeed = 0.10;
var fallSpeed = 0.10;
var murphy_direction_move = 0;
var murphy_direction_changed = 0;



var touchDown=0;

canvas.addEventListener('mousemove', function(evt) {
var mousePos = getMousePos(canvas, evt);
        xCoor=mousePos.x;
        yCoor=mousePos.y;
  }, false);

canvas.addEventListener('mousedown', function(evt) {
      if(xCoor>160&&xCoor<224)
        {if(yCoor>553&&yCoor<576)
          {if(levelToLoad<totalLevels){levelToLoad++;}}
          else if(yCoor>=576&&yCoor<608)
            {if(levelToLoad>1){levelToLoad--; }}

        }
  }, false);

var keysDown = {};

addEventListener("keydown", function (e) {
  keysDown[e.keyCode] = true;
}, false);

addEventListener("keyup", function (e) {
  delete keysDown[e.keyCode];
}, false);

canvas.addEventListener("touchstart",
            function(touchEvent) {
                var e= touchEvent.targetTouches[0];

                var x= e.pageX;
                var y= e.pageY;

                  if((murphy_move==0) && (x>=704))
                  {
                    touchDown=1;

                    if((y>=608)&&(y<=690) )
                    {
                        murphy_move = 1;
                        murphy_direction = 1;
                    }
                     
                    else if(y>690) 
                    {
                      if((x>=704)&&(x<810))
                      {
                        murphy_move = 1;
                        murphy_direction = 3;
                      }
                      else if((x>=810)&&(x<920))
                      {
                        murphy_move = 1;
                        murphy_direction = 2;
                      }
                      else if(x>=920)
                      {
                        murphy_move = 1;
                        murphy_direction = 4;
                      }
                    }
                }

               
            });

 canvas.addEventListener("touchmove",
            function(touchEvent) {
                var e= touchEvent.targetTouches[0];

                var x= e.pageX;
                var y= e.pageY;

                    if((y>=608)&&(y<=690) )
                    {
                        murphy_direction_move = 1;
                    }
                     
                    else if(y>690) 
                    {
                      if((x>=704)&&(x<810))
                      {
                        murphy_direction_move = 3;
                      }
                      else if((x>=810)&&(x<920))
                      {
                        murphy_direction_move = 2;
                      }
                      else if(x>=920)
                      {
                        murphy_direction_move = 4;
                      }
                    }

                    if(murphy_direction==murphy_direction_move)
                    {murphy_direction_changed=0;}
                    else {murphy_direction_changed=1;}
                

               
            });


 canvas.addEventListener("touchend",
            function (e) {
                    touchDown=0;
               
            });


// Update game objects
var update = function () 
{
  if(27 in keysDown)
  {
    murphy.hit=1;
    explode(murphy.x-1,murphy.y-1);
  }
  if(murphy_move!==1)
  {
    // All the moving parts!
    if (38 in keysDown) { // Player holding up
      murphy_move = 1;
      murphy_direction = 1;
    }
    if (40 in keysDown) { // Player holding down
      murphy_move = 1;
      murphy_direction = 2;
    }
    if (37 in keysDown) { // Player holding left
      murphy_move = 1;
      murphy_direction = 3;
      murphy_lastside=0;
    }
    if (39 in keysDown) { // Player holding right
      murphy_move = 1;
      murphy_direction = 4;
      murphy_lastside=1;
    }
    if (32 in keysDown) { // Player holding right
      murphy_pull = 1;
    }
    if(16 in keysDown&&redDisks>=1&&diskIsPlanted==0)
    {
      plantDisk(murphy.x-1,murphy.y-1);
      redDisks--;
    }
if(murphy.hit==0){
  var mx=murphy.x-1;
  var my=murphy.y-1;
  if((line[my+1][mx]>42||line[my+1][mx]==27||line[my+1][mx]==28)&&40 in keysDown) {murphy.hit=1;explode(mx,my);}

  if((line[my-1][mx]>42||line[my-1][mx]==27||line[my-1][mx]==28)&&38 in keysDown) {murphy.hit=1;explode(mx,my);}
  
  if((line[my][mx+1]>42||line[my][mx+1]==27||line[my][mx+1]==28)&&39 in keysDown) {murphy.hit=1;explode(mx,my);}
  
  if((line[my][mx-1]>42||line[my][mx-1]==27||line[my][mx-1]==28)&&37 in keysDown) {murphy.hit=1;explode(mx,my);}}
  }
};

// Draw everything
var render = function () {
  if(murphy.hit==1&&line[murphy.y-1][murphy.x-1]==9)
{
  if(murphy.win!==1){explode(murphy.x-1,murphy.y-1);}
  //murphy.move=
  line[murphy.y-1][murphy.x-1]=121;
  //smurphy.x=0;murphy.y=40;
}

//Get envrioment and reserve array elements
for(var i=0;i<objCount;i++)
{
  var cx = fallObject[i].x;
  var cy = fallObject[i].y;
  var mx = murphy.x-1;
  var my = murphy.y-1;


  if(fallObject[i].id>=100)  
  {
    fallObject[i].id++;
    if(fallObject[i].id==108){explode(cx,cy);fallObject[i].x=-1;}
  }

  getEnvrioment(i,cx,cy);  //Set objects for falling or pushing (physics)

    // Start moveing objects!
    if(fallObject[i].isFalling==1)
      {
        fallFunction(i,cx,cy);
      }
    // ----- IS PUSHED BY MURPHY
    else if(fallObject[i].isPushed==1)
      {
        functionPushRight(i,cx,cy);
      }
    else if(fallObject[i].isPushed==2)
     {
        functionPushLeft(i,cx,cy);
     }
    else if(fallObject[i].isPushed==5)
      {
        functionPushDown(i,cx,cy);
    }
    else if(fallObject[i].isPushed==6)
     {
        functionPushUp(i,cx,cy);
    }
    //----------- PHYSICS FALL
    else if(fallObject[i].isPushed==3&&line[cy][cx+1]!==9)
      {
        functionFallRight(i,cx,cy);
    }
    else if(fallObject[i].isPushed==4&&line[cy][cx-1]!==9)
      {
       functionFallLeft(i,cx,cy);
    }
}

for(var i=0;i<aiCount;i++)
{
  aiMove(i);
}

if(line[murphy.y-1][murphy.x-1]==27||line[murphy.y-1][murphy.x-1]==28)
{
  explode(murphy.x-1,murphy.y-1);
}

if(murphy_pull==1)
{
  murphy_pull=0;
  var mx = murphy.x-1;
  var my = murphy.y-1;
  murphy_move=0;
  functionMurphyPull(murphy_direction);  
}

if(murphy_move==1&&murphy.hit!==1) //check for colusions
{
  var mx = murphy.x-1;
  var my = murphy.y-1;

  if(line[my+1][mx]==3&&murphy_direction==2&&requiredInfotrons<=murphy.infotrons) {murphy.win=1;}
  if(line[my-1][mx]==3&&murphy_direction==1&&requiredInfotrons<=murphy.infotrons) {murphy.win=1;}
  if(line[my][mx+1]==3&&murphy_direction==4&&requiredInfotrons<=murphy.infotrons) {murphy.win=1;}
  if(line[my][mx-1]==3&&murphy_direction==3&&requiredInfotrons<=murphy.infotrons) {murphy.win=1;}

  if(line[my+1][mx]==2&&murphy_direction==2&&terminalBlow==0) {terminalBlow=1;}
  if(line[my-1][mx]==2&&murphy_direction==1&&terminalBlow==0) {terminalBlow=1;}
  if(line[my][mx+1]==2&&murphy_direction==4&&terminalBlow==0) {terminalBlow=1;}
  if(line[my][mx-1]==2&&murphy_direction==3&&terminalBlow==0) {terminalBlow=1;}

  if(terminalBlow==1)
  {
    for(var i=0;i<objCount;i++)
    {
      if(fallObject[i].id==7)
      {
        explode(fallObject[i].x,fallObject[i].y);
      }
    }
    terminalBlow=2;
  }

  functionMurphyPush(i);
  
}

if(murphy.isPushing!==0)
{
  if(37 in keysDown || 39 in keysDown)
  {}
  else {murphy.isPushing=0;}
}

if(murphy_move==1&&murphy.hit!==1)
{
  if((line[my][mx+1]==-1&&murphy_direction==4&&murphy_distance>2)||(line[my][mx-1]==-1&&murphy_direction==3&&murphy_distance>2))
  {
    murphy.hit=1;
    explode(murphy.x-1,murphy.y-1);
  }

  functionMurphyMove();
}

    ctx.drawImage(bgImage, 0, 0);


  for(var i=0;i<19;i++)
  {
    for(var j=0;j<32;j++)
    {
      switch (line[i][j])
      {
        case 1: {ctx.drawImage(baseImage, j*32,i*32);break;}
        case 2: {ctx.drawImage(terminalImage, j*32,i*32);break;}
        case 3: {ctx.drawImage(exitImage, j*32,i*32);break;}
       // case 4: {ctx.drawImage(o_diskImage, j*32,i*32);break;}
        case 8: {ctx.drawImage(r_diskImage, j*32,i*32);break;}
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
//case 27: {ctx.drawImage(hw11Image, j*32,i*32);break;}
        case 39: {ctx.drawImage(baseImage, j*32,i*32); var rand=Math.random(); if(rand<0.005){line[i][j]++;}break;}
        case 40: {ctx.drawImage(baseImage, j*32,i*32); var rand=Math.random(); if(rand<0.02){line[i][j]++;}break;}
        case 41: {ctx.drawImage(bug_1Image, j*32,i*32); line[i][j]++;break;}
        case 42: {ctx.drawImage(bug_1Image, j*32,i*32); line[i][j]++;break;}
        case 43: {ctx.drawImage(bug_2Image, j*32,i*32); line[i][j]++;break;}
        case 44: {ctx.drawImage(bug_2Image, j*32,i*32); line[i][j]++;break;}
        case 45: {ctx.drawImage(bug_3Image, j*32,i*32); line[i][j]++;break;}
        case 46: {ctx.drawImage(bug_3Image, j*32,i*32); line[i][j]++;break;}
        case 47: {ctx.drawImage(bug_4Image, j*32,i*32); line[i][j]++;break;}
        case 48: {ctx.drawImage(bug_4Image, j*32,i*32); line[i][j]++;break;}
        case 49: {ctx.drawImage(bug_5Image, j*32,i*32); line[i][j]++;break;}
        case 50: {ctx.drawImage(bug_5Image, j*32,i*32); var rand=Math.random(); if(rand<0.6){line[i][j]=43;}else{line[i][j]=39;}break;}


        case 80: {ctx.drawImage(explosion_1Image, j*32,i*32);line[i][j]++;break;}
        case 81: {ctx.drawImage(explosion_1Image, j*32,i*32);line[i][j]++;break;}
        case 82: {ctx.drawImage(explosion_2Image, j*32,i*32);line[i][j]++;break;}
        case 83: {ctx.drawImage(explosion_2Image, j*32,i*32);line[i][j]++;break;}
        case 84: {ctx.drawImage(explosion_3Image, j*32,i*32);line[i][j]++;break;}
        case 85: {ctx.drawImage(explosion_3Image, j*32,i*32);line[i][j]++;break;}
        case 86: {ctx.drawImage(explosion_4Image, j*32,i*32);line[i][j]++;break;}
        case 87: {ctx.drawImage(explosion_4Image, j*32,i*32);line[i][j]++;break;}
        case 88: {ctx.drawImage(explosion_5Image, j*32,i*32);line[i][j]++;break;}
        case 89: {ctx.drawImage(explosion_5Image, j*32,i*32);line[i][j]++;break;}
        case 90: {ctx.drawImage(explosion_6Image, j*32,i*32);line[i][j]++;break;}
        case 91: {ctx.drawImage(explosion_6Image, j*32,i*32);line[i][j]++;break;}
        case 92: {ctx.drawImage(explosion_7Image, j*32,i*32);line[i][j]++;break;}
        case 93: {ctx.drawImage(explosion_7Image, j*32,i*32);line[i][j]=0;explode(j,i);break;}

        case 101: {ctx.drawImage(explosion_1Image, j*32,i*32);line[i][j]++;break;}
        case 102: {ctx.drawImage(explosion_1Image, j*32,i*32);line[i][j]++;break;}
        case 103: {ctx.drawImage(explosion_2Image, j*32,i*32);line[i][j]++;break;}
        case 104: {ctx.drawImage(explosion_2Image, j*32,i*32);line[i][j]++;break;}
        case 105: {ctx.drawImage(explosion_3Image, j*32,i*32);line[i][j]++;break;}
        case 106: {ctx.drawImage(explosion_3Image, j*32,i*32);line[i][j]++;break;}
        case 107: {ctx.drawImage(explosion_4Image, j*32,i*32);line[i][j]++;break;}
        case 108: {ctx.drawImage(explosion_4Image, j*32,i*32);line[i][j]++;break;}
        case 109: {ctx.drawImage(explosion_5Image, j*32,i*32);line[i][j]++;break;}
        case 110: {ctx.drawImage(explosion_5Image, j*32,i*32);line[i][j]++;break;}
        case 111: {ctx.drawImage(explosion_6Image, j*32,i*32);line[i][j]++;break;}
        case 112: {ctx.drawImage(explosion_6Image, j*32,i*32);line[i][j]++;break;}
        case 113: {ctx.drawImage(explosion_7Image, j*32,i*32);line[i][j]++;break;}
        case 114: {ctx.drawImage(explosion_7Image, j*32,i*32);line[i][j]=0;break;}

        case 121: {ctx.drawImage(exit_1Image, j*32,i*32);line[i][j]++;break;}
        case 122: {ctx.drawImage(exit_1Image, j*32,i*32);line[i][j]++;break;}
        case 123: {ctx.drawImage(exit_2Image, j*32,i*32);line[i][j]++;break;}
        case 124: {ctx.drawImage(exit_2Image, j*32,i*32);line[i][j]++;break;}
        case 125: {ctx.drawImage(exit_3Image, j*32,i*32);line[i][j]++;break;}
        case 126: {ctx.drawImage(exit_3Image, j*32,i*32);line[i][j]++;break;}
        case 127: {ctx.drawImage(exit_4Image, j*32,i*32);line[i][j]++;break;}
        case 128: {ctx.drawImage(exit_4Image, j*32,i*32);line[i][j]++;break;}
        case 129: {ctx.drawImage(exit_5Image, j*32,i*32);line[i][j]++;break;}
        case 130: {ctx.drawImage(exit_5Image, j*32,i*32);line[i][j]++;break;}
        case 131: {ctx.drawImage(exit_6Image, j*32,i*32);line[i][j]++;break;}
        case 132: {ctx.drawImage(exit_6Image, j*32,i*32);line[i][j]++;break;}
        case 133: {ctx.drawImage(exit_7Image, j*32,i*32);line[i][j]++;break;}
        case 134: {ctx.drawImage(exit_7Image, j*32,i*32);line[i][j]=0;break;}

       // case 8: {ctx.drawImage(explosionImage, j*32,i*32);break;}
      }
    }
  }

  for(var i=0;i<aiCount;i++)
  {
    switch (aiObject[i].id)
    {
      case 27: { switch(aiObject[i].direction)
                    {
                      case 1: { switch(aiObject[i].moveDistance) 
                                  {
                                    case 1: {ctx.drawImage(sniksnak_up_0Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                    case 2: {ctx.drawImage(sniksnak_up_3Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                    case 3: {ctx.drawImage(sniksnak_up_2Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                    case 4: {ctx.drawImage(sniksnak_up_1Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                    case 5: {ctx.drawImage(sniksnak_up_1Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                    case 6: {ctx.drawImage(sniksnak_up_2Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                    case 7: {ctx.drawImage(sniksnak_up_2Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                    case 8: {ctx.drawImage(sniksnak_up_3Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                    case 9: {ctx.drawImage(sniksnak_up_3Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                    case 0: {ctx.drawImage(sniksnak_up_0Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                     }
                              }break;
                      case 2: { switch(aiObject[i].moveDistance) 
                                  {
                                    case 1: {ctx.drawImage(sniksnak_right_0Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                    case 2: {ctx.drawImage(sniksnak_right_3Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                    case 3: {ctx.drawImage(sniksnak_right_2Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                    case 4: {ctx.drawImage(sniksnak_right_1Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                    case 5: {ctx.drawImage(sniksnak_right_1Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                    case 6: {ctx.drawImage(sniksnak_right_2Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                    case 7: {ctx.drawImage(sniksnak_right_2Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                    case 8: {ctx.drawImage(sniksnak_right_3Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                    case 9: {ctx.drawImage(sniksnak_right_3Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                    case 0: {ctx.drawImage(sniksnak_right_0Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                     }
                              }break;
                      case 3: { switch(aiObject[i].moveDistance) 
                                  {
                                    case 1: {ctx.drawImage(sniksnak_down_0Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                    case 2: {ctx.drawImage(sniksnak_down_3Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                    case 3: {ctx.drawImage(sniksnak_down_2Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                    case 4: {ctx.drawImage(sniksnak_down_1Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                    case 5: {ctx.drawImage(sniksnak_down_1Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                    case 6: {ctx.drawImage(sniksnak_down_2Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                    case 7: {ctx.drawImage(sniksnak_down_2Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                    case 8: {ctx.drawImage(sniksnak_down_3Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                    case 9: {ctx.drawImage(sniksnak_down_3Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                    case 0: {ctx.drawImage(sniksnak_down_0Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                     }
                              }break;
                      case 4: { switch(aiObject[i].moveDistance) 
                                  {
                                    case 1: {ctx.drawImage(sniksnak_left_0Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                    case 2: {ctx.drawImage(sniksnak_left_3Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                    case 3: {ctx.drawImage(sniksnak_left_2Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                    case 4: {ctx.drawImage(sniksnak_left_1Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                    case 5: {ctx.drawImage(sniksnak_left_1Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                    case 6: {ctx.drawImage(sniksnak_left_2Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                    case 7: {ctx.drawImage(sniksnak_left_2Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                    case 8: {ctx.drawImage(sniksnak_left_3Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                    case 9: {ctx.drawImage(sniksnak_left_3Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                    case 0: {ctx.drawImage(sniksnak_left_0Image, (aiObject[i].x+aiObject[i].xoffset)*32, (aiObject[i].y+aiObject[i].yoffset)*32);break;}
                                     }
                              }break;
                    }
                    break;}
    }
  }

  for(var i=0;i<objCount;i++)
  {
    switch (fallObject[i].id)
    {
    case 4: {ctx.drawImage(o_diskImage, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32);break;}
    case 5: {
          if(fallObject[i].isPushed==1||fallObject[i].isPushed==3)
          {
            switch(fallObject[i].fallDistance)
                {
                  case 1: {ctx.drawImage(zonkImage, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                  case 2: {ctx.drawImage(zonk_roll_3Image, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                  case 3: {ctx.drawImage(zonk_roll_3Image, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                  case 4: {ctx.drawImage(zonk_roll_2Image, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                  case 5: {ctx.drawImage(zonk_roll_2Image, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                  case 6: {ctx.drawImage(zonk_roll_2Image, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                  case 7: {ctx.drawImage(zonk_roll_1Image, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                  case 8: {ctx.drawImage(zonk_roll_1Image, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                  case 0: {ctx.drawImage(zonkImage, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                  default:  {ctx.drawImage(zonkImage, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                }
            }
          else if(fallObject[i].isPushed==2||fallObject[i].isPushed==4)
            {
                switch(fallObject[i].fallDistance)
                {
                case 1: {ctx.drawImage(zonkImage, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                case 2: {ctx.drawImage(zonk_roll_1Image, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                case 3: {ctx.drawImage(zonk_roll_1Image, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                case 4: {ctx.drawImage(zonk_roll_2Image, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                case 5: {ctx.drawImage(zonk_roll_2Image, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                case 6: {ctx.drawImage(zonk_roll_2Image, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                case 7: {ctx.drawImage(zonk_roll_3Image, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                case 8: {ctx.drawImage(zonk_roll_3Image, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                case 0: {ctx.drawImage(zonkImage, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                default: {ctx.drawImage(zonkImage, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                }
              }
              else if(fallObject[i].isPushed==0){ctx.drawImage(zonkImage, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32);}
            break;}
    case 6: {  
    if(fallObject[i].isPushed==4)
          {
            switch(fallObject[i].fallDistance)
                {
                  case 1: {ctx.drawImage(infotron_roll_1Image, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                  case 2: {ctx.drawImage(infotron_roll_2Image, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                  case 3: {ctx.drawImage(infotron_roll_3Image, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                  case 4: {ctx.drawImage(infotron_roll_4Image, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                  case 5: {ctx.drawImage(infotron_roll_5Image, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                  case 6: {ctx.drawImage(infotron_roll_6Image, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                  case 7: {ctx.drawImage(infotron_roll_7Image, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                  case 8: {ctx.drawImage(infotron_roll_7Image, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                  case 0: {ctx.drawImage(infotron_roll_1Image, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                  default:  {ctx.drawImage(infotronImage, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                }
            }
          else if(fallObject[i].isPushed==3)
            {
                switch(fallObject[i].fallDistance)
                {
                case 1: {ctx.drawImage(infotron_roll_7Image, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                case 2: {ctx.drawImage(infotron_roll_6Image, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                case 3: {ctx.drawImage(infotron_roll_5Image, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                case 4: {ctx.drawImage(infotron_roll_4Image, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                case 5: {ctx.drawImage(infotron_roll_3Image, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                case 6: {ctx.drawImage(infotron_roll_2Image, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                case 7: {ctx.drawImage(infotron_roll_1Image, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                case 8: {ctx.drawImage(infotron_roll_1Image, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                case 0: {ctx.drawImage(infotron_roll_7Image, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                default: {ctx.drawImage(infotronImage, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
                }
              }
              else if(fallObject[i].isPushed==0){ctx.drawImage(infotronImage, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32);}
            break;}
    case 7: { ctx.drawImage(y_diskImage, (fallObject[i].x+fallObject[i].xoffset)*32, (fallObject[i].y+fallObject[i].yoffset)*32); break;}
    }

  }

  if(murphy_lastside==0&&(murphy_move==1||37 in keysDown||38 in keysDown||40 in keysDown)&&murphy_pull==0&&murphy.isPushing==0&&murphy.hit!==1)
  {
    switch (murphy_distance)
    {
      case 1: {ctx.drawImage(murphy_left_0Image, ((murphy.x+murphy.xoffset)*32)-32, ((murphy.y+murphy.yoffset)*32)-32);break;}
      case 2: {ctx.drawImage(murphy_left_0Image, ((murphy.x+murphy.xoffset)*32)-32, ((murphy.y+murphy.yoffset)*32)-32);break;}
      case 3: {ctx.drawImage(murphy_left_1Image, ((murphy.x+murphy.xoffset)*32)-32, ((murphy.y+murphy.yoffset)*32)-32);break;}
      case 4: {ctx.drawImage(murphy_left_1Image, ((murphy.x+murphy.xoffset)*32)-32, ((murphy.y+murphy.yoffset)*32)-32);break;}
      case 5: {ctx.drawImage(murphy_left_2Image, ((murphy.x+murphy.xoffset)*32)-32, ((murphy.y+murphy.yoffset)*32)-32);break;}
      case 6: {ctx.drawImage(murphy_left_2Image, ((murphy.x+murphy.xoffset)*32)-32, ((murphy.y+murphy.yoffset)*32)-32);break;}
      case 7: {ctx.drawImage(murphy_left_2Image, ((murphy.x+murphy.xoffset)*32)-32, ((murphy.y+murphy.yoffset)*32)-32);break;}
      case 8: {ctx.drawImage(murphy_left_2Image, ((murphy.x+murphy.xoffset)*32)-32, ((murphy.y+murphy.yoffset)*32)-32);break;}
      case 9: {ctx.drawImage(murphy_left_1Image, ((murphy.x+murphy.xoffset)*32)-32, ((murphy.y+murphy.yoffset)*32)-32);break;}
      case 10: {ctx.drawImage(murphy_left_1Image, ((murphy.x+murphy.xoffset)*32)-32, ((murphy.y+murphy.yoffset)*32)-32);break;}
      case 0: {ctx.drawImage(murphy_left_0Image, ((murphy.x+murphy.xoffset)*32)-32, ((murphy.y+murphy.yoffset)*32)-32);break;}
    }
  }
  else if(murphy_lastside==1&&(murphy_move==1||39 in keysDown||38 in keysDown||40 in keysDown)&&murphy_pull==0&&murphy.isPushing==0&&murphy.hit!==1)
  {
  switch (murphy_distance)
    {
      case 1: {ctx.drawImage(murphy_right_0Image, ((murphy.x+murphy.xoffset)*32)-32, ((murphy.y+murphy.yoffset)*32)-32);break;}
      case 2: {ctx.drawImage(murphy_right_0Image, ((murphy.x+murphy.xoffset)*32)-32, ((murphy.y+murphy.yoffset)*32)-32);break;}
      case 3: {ctx.drawImage(murphy_right_1Image, ((murphy.x+murphy.xoffset)*32)-32, ((murphy.y+murphy.yoffset)*32)-32);break;}
      case 4: {ctx.drawImage(murphy_right_1Image, ((murphy.x+murphy.xoffset)*32)-32, ((murphy.y+murphy.yoffset)*32)-32);break;}
      case 5: {ctx.drawImage(murphy_right_2Image, ((murphy.x+murphy.xoffset)*32)-32, ((murphy.y+murphy.yoffset)*32)-32);break;}
      case 6: {ctx.drawImage(murphy_right_2Image, ((murphy.x+murphy.xoffset)*32)-32, ((murphy.y+murphy.yoffset)*32)-32);break;}
      case 7: {ctx.drawImage(murphy_right_2Image, ((murphy.x+murphy.xoffset)*32)-32, ((murphy.y+murphy.yoffset)*32)-32);break;}
      case 8: {ctx.drawImage(murphy_right_2Image, ((murphy.x+murphy.xoffset)*32)-32, ((murphy.y+murphy.yoffset)*32)-32);break;}
      case 9: {ctx.drawImage(murphy_right_1Image, ((murphy.x+murphy.xoffset)*32)-32, ((murphy.y+murphy.yoffset)*32)-32);break;}
      case 10: {ctx.drawImage(murphy_right_1Image, ((murphy.x+murphy.xoffset)*32)-32, ((murphy.y+murphy.yoffset)*32)-32);break;}
      case 0: {ctx.drawImage(murphy_right_0Image, ((murphy.x+murphy.xoffset)*32)-32, ((murphy.y+murphy.yoffset)*32)-32);break;}
    }
  }
  else if(murphy.isPushing==2&&murphy.hit!==1)
  {ctx.drawImage(murphy_push_leftImage, ((murphy.x+murphy.xoffset)*32)-32, ((murphy.y+murphy.yoffset)*32)-32);}
  else if(murphy.isPushing==1&&murphy.hit!==1)
  {ctx.drawImage(murphy_push_rightImage, ((murphy.x+murphy.xoffset)*32)-32, ((murphy.y+murphy.yoffset)*32)-32);}


  else if(murphy.hit!==1){ctx.drawImage(murphyImage, ((murphy.x+murphy.xoffset)*32)-32, ((murphy.y+murphy.yoffset)*32)-32);}
  
    if(diskIsPlanted==1)
    {
      if(Date.now()<diskDelay)
        {ctx.drawImage(r_diskImage, diskX*32,diskY*32); line[diskY][diskX]=15;}
      else{explode(diskX,diskY);diskIsPlanted=0;}
    }

  // Score

  ctx.fillStyle = "rgb(255, 0, 0)";
  ctx.font = "18px Helvetica ";
  ctx.textAlign = "center";
  ctx.fillText(murphy.infotrons+'/'+requiredInfotrons, 125, 696 );
  
    ctx.fillText("Level "+levelToLoad, 125, 623);
    ctx.textAlign = "left";
    ctx.fillText(level_name, 200, 623);
    ctx.fillText("By: "+level_author, 423, 659);

};

// The main game loop
var main = function ()  {
  if(murphy.hit<1&&newGame==1)
  {
    if(murphy.win==1)
    {
      murphy.hit=1;
      if(levelToLoad==levelsAvaible)
      {levelsAvaible++;}
      //loadGame(gameLevel); 
    }
      update();
      render();
      timeDelay=Date.now();
  }
  else if(murphy.hit==1&&(Date.now()-timeDelay<2000))
  {
    update();
      render();
      bsod=1;
  }
    else if(bsod==1)
  {
    for(var i=0;i<objCount;i++)
{
  delete fallObject[i];
}
for(var i=0;i<19;i++)
{
  delete line[i];
}
    update();
      drawBSOD();
      newGame=0;
  }
  else
  {
    drawMenu();
  }

};
setInterval(main,1000/40);

 // Execute as fast as possible
 //rolls in falling object!
  
//________________________  ADDON FUNCTIONS

var explode = function(ex,ey)
{
  
    var mx = murphy.x-1;
    var my = murphy.y-1;
    if(mx==ex-1&&my==ey-1) {murphy.hit=1;}
    if(mx==ex&&  my==ey-1) {murphy.hit=1;}
    if(mx==ex+1&&my==ey-1) {murphy.hit=1;}
                                                       
    if(mx==ex-1&&my==ey)   {murphy.hit=1;}
    if(mx==ex&&  my==ey)   {murphy.hit=1;}
    if(mx==ex+1&&my==ey)   {murphy.hit=1;}
                                                     
    if(mx==ex-1&&my==ey+1) {murphy.hit=1;}
    if(mx==ex&&  my==ey+1) {murphy.hit=1;}
    if(mx==ex+1&&my==ey+1) {murphy.hit=1;}

      for(var i=0;i<aiCount;i++)
  {
    var fx = aiObject[i].x;
    var fy = aiObject[i].y;
    if(fx==ex-1&&fy==ey-1)  {aiObject[i].x=-2;explode(fx,fy);}
    if(fx==ex&&fy==ey-1  )  {aiObject[i].x=-2;explode(fx,fy);}
    if(fx==ex+1&&fy==ey-1)  {aiObject[i].x=-2;explode(fx,fy);}                                       
    if(fx==ex-1&&fy==ey  )  {aiObject[i].x=-2;explode(fx,fy);}
    if(fx==ex&&fy==ey)      {aiObject[i].x=-2;explode(fx,fy);} 
    if(fx==ex+1&&fy==ey  )  {aiObject[i].x=-2;explode(fx,fy);}                                        
    if(fx==ex-1&&fy==ey+1)  {aiObject[i].x=-2;explode(fx,fy);}
    if(fx==ex&&fy==ey+1  )  {aiObject[i].x=-2;explode(fx,fy);}
    if(fx==ex+1&&fy==ey+1)  {aiObject[i].x=-2;explode(fx,fy);}
  }

  for(var i=0;i<objCount;i++)
  {
    var fx = fallObject[i].x;
    var fy = fallObject[i].y;

    if(fx==ex-1&&fy==ey-1)  {fallObject[i].x=-1;}
    if(fx==ex&&fy==ey-1  )  {fallObject[i].x=-1;}
    if(fx==ex+1&&fy==ey-1)  {fallObject[i].x=-1;}                                       
    if(fx==ex-1&&fy==ey  )  {fallObject[i].x=-1;}
    if(fx==ex&&fy==ey) {fallObject[i].x=-1;} 
    if(fx==ex+1&&fy==ey  )  {fallObject[i].x=-1;}                                        
    if(fx==ex-1&&fy==ey+1)  {fallObject[i].x=-1;}
    if(fx==ex&&fy==ey+1  )  {fallObject[i].x=-1;}
    if(fx==ex+1&&fy==ey+1)  {fallObject[i].x=-1;}
  }

  if((line[ey-1][ex-1]==27||line[ey-1][ex-1]>109||line[ey-1][ex-1]<15||(line[ey-1][ex-1]>25&&line[ey-1][ex-1]<41))&&line[ey-1][ex-1]!==7&&line[ey-1][ex-1]!==4)   {line[ey-1][ex-1]=101;}
  else if(line[ey-1][ex-1]<15&&(line[ey-1][ex-1]==7||line[ey-1][ex-1]==4))   {line[ey-1][ex-1]=81;}
//  
  if((line[ey-1][ex  ]==27||line[ey-1][ex  ]>109||line[ey-1][ex  ]<15||(line[ey-1][ex  ]>25&&line[ey-1][ex  ]<41))&&line[ey-1][ex  ]!==7&&line[ey-1][ex  ]!==4)   {line[ey-1][ex]=  101;}
  else if(line[ey-1][ex  ]<15&&(line[ey-1][ex  ]==7||line[ey-1][ex  ]==4))   {line[ey-1][ex]=  81;}
//
  if((line[ey-1][ex+1]==27||line[ey-1][ex+1]>109||line[ey-1][ex+1]<15||(line[ey-1][ex+1]>25&&line[ey-1][ex+1]<41))&&line[ey-1][ex+1]!==7&&line[ey-1][ex+1]!==4)   {line[ey-1][ex+1]=101;}
  else if(line[ey-1][ex+1]<15&&(line[ey-1][ex+1]==7||line[ey-1][ex+1]==4))   {line[ey-1][ex+1]=81;}
//
  if((line[ey  ][ex-1]==27||line[ey  ][ex-1]>109||line[ey  ][ex-1]<15||(line[ey  ][ex-1]>25&&line[ey  ][ex-1]<41))&&line[ey  ][ex-1]!==7&&line[ey  ][ex-1]!==4)   {line[ey  ][ex-1]=101;}
  else if(line[ey  ][ex-1]<15&&(line[ey  ][ex-1]==7||line[ey  ][ex-1]==4))   {line[ey  ][ex-1]=81;}
//
  line[ey][ex]=  101;
//
  if((line[ey  ][ex+1]==27||line[ey  ][ex+1]>109||line[ey  ][ex+1]<15||(line[ey  ][ex+1]>25&&line[ey  ][ex+1]<41))&&line[ey  ][ex+1]!==7&&line[ey  ][ex+1]!==4)   {line[ey  ][ex+1]=101;}
  else if(line[ey  ][ex+1]<15&&(line[ey  ][ex+1]==7||line[ey  ][ex+1]==4))   {line[ey  ][ex+1]=81;}
//
  if((line[ey+1][ex-1]==27||line[ey+1][ex-1]>109||line[ey+1][ex-1]<15||(line[ey+1][ex-1]>25&&line[ey+1][ex-1]<41))&&line[ey+1][ex-1]!==7&&line[ey+1][ex-1]!==4)   {line[ey+1][ex-1]=101;}
  else if(line[ey+1][ex-1]<15&&(line[ey+1][ex-1]==7||line[ey+1][ex-1]==4))   {line[ey+1][ex-1]=81;}
//
  if((line[ey+1][ex  ]==27||line[ey+1][ex  ]>109||line[ey+1][ex  ]<15||(line[ey+1][ex  ]>25&&line[ey+1][ex  ]<41))&&line[ey+1][ex  ]!==7&&line[ey+1][ex  ]!==4)   {line[ey+1][ex]=  101;}
  else if(line[ey+1][ex  ]<15&&(line[ey+1][ex  ]==7||line[ey+1][ex  ]==4))   {line[ey+1][ex]=  81;}
//
  if((line[ey+1][ex+1]==27||line[ey+1][ex+1]>109||line[ey+1][ex+1]<15||(line[ey+1][ex+1]>25&&line[ey+1][ex+1]<41))&&line[ey+1][ex+1]!==7&&line[ey+1][ex+1]!==4)   {line[ey+1][ex+1]=101;}
  else if(line[ey+1][ex+1]<15&&(line[ey+1][ex+1]==7||line[ey+1][ex+1]==4))   {line[ey+1][ex+1]=81;}
};


var drawMenu = function () 
{
  ctx.textBaseline = "top";
  var textLine=150;
  ctx.fillStyle = "black";
  ctx.fillRect(0, 0,canvas.width, canvas.height);

  
  ctx.fillStyle = '#ff2';
  ctx.font = "14px Courier New";
  ctx.drawImage(logoImage, 20,40);
  ctx.fillText(version, 105, 70);

  ctx.fillStyle = '#f80'
  ctx.font = "20px Courier New Bold";
  ctx.fillText("Snik-snak?", 240,50);
  if(menuFrame<2)        {ctx.drawImage(sniksnak_left_0Image, 363, 46);menuFrame++;}
  else if(menuFrame<4)  {ctx.drawImage(sniksnak_left_3Image, 363, 46);menuFrame++;}
  else if(menuFrame<8)  {ctx.drawImage(sniksnak_left_2Image, 363, 46);menuFrame++;}
  else if(menuFrame<11)  {ctx.drawImage(sniksnak_left_1Image, 363, 46);menuFrame++;}
  else if(menuFrame<14)  {ctx.drawImage(sniksnak_left_2Image, 363, 46);menuFrame++;}
  else if(menuFrame<17)  {ctx.drawImage(sniksnak_left_3Image, 363, 46);menuFrame++;}
  else if(menuFrame==17)  {ctx.drawImage(sniksnak_left_3Image, 363, 46);menuFrame=0;}

  ctx.fillStyle = '#dd4';
  ctx.font = "16px Helvetica, Bold";

  ctx.fillText("[Murphy]", 64, textLine+7);textLine+=40;
  ctx.fillText("[Base]", 64, textLine+7);textLine+=40;
  ctx.fillText("[Zonk]", 64, textLine+7);textLine+=40;
  ctx.fillText("[Infotron]", 64, textLine+7);textLine+=40;
  ctx.fillText("[Exit] ", 64, textLine+7);textLine+=40;
  ctx.fillText("[Terminal]", 64, textLine+7);textLine+=40;
  ctx.fillText("[Hardware]", 64, textLine+7);textLine+=40;
  ctx.fillText("[Disk]", 64, textLine+7);textLine+=40;

  textLine=150;
  ctx.fillStyle = '#ddd';
  ctx.font = "16px Helvetica";

  ctx.drawImage(murphyImage, 20,textLine);
  ctx.fillText("This is you, the player, named Murphy.", 160, textLine+7);
  textLine+=40;
  ctx.drawImage(baseImage, 20,textLine);
  ctx.fillText("It's main function is keeping things from falling down. Murphy can freely walk through this. ", 160, textLine+7);
  textLine+=40;
  ctx.drawImage(zonkImage, 20,textLine);
  ctx.fillText("This is another very common obstacle a Zonk tends to fall down whenever possible.", 160, textLine+7);
  textLine+=40;
  ctx.drawImage(infotronImage, 20,textLine);
  ctx.fillText("These are very important in almost every level. You need to collect a set number of these.", 160, textLine+7);
  textLine+=40;
  ctx.drawImage(exitImage, 20,textLine);
  ctx.fillText("This is the final objective of each level. You need to press against the Exit to leave the level. ", 160, textLine+7);
  textLine+=40;
  ctx.drawImage(terminalImage, 20,textLine);
  ctx.fillText("These will allow the player to blow up Yellow Disks.", 160, textLine+7);
  textLine+=40;
  ctx.drawImage(hw1Image, 20,textLine);
  ctx.fillText("Hardware blocks are the most boring part of the game. They don't move, they can't blow up, they just sit there.", 160, textLine+7);
  textLine+=40;
  ctx.drawImage(y_diskImage, 20,textLine);
  ctx.fillText("will explode once you hit a Terminal. Before they explode, you can push them around all you want,.", 160, textLine+7);
  textLine+=40;

  //ctx.fillText("game rules.                           ", 20, textLine); textLine+=20;
  textLine+=40;

  ctx.fillStyle = '#dd1';
  ctx.font = "22px Helvetica";
  ctx.fillText("Select level and press [Spacebar] to play", 160, textLine);textLine+=40;


  ctx.fillStyle = '#eee';
  ctx.font = "32px Helvetica";
  ctx.textAlign = "center";
  //for(var i=1;i<11;i++)
  //{ 
  // // if(levelsAvaible<i){ctx.fillStyle = '#f00';}
  // // else {ctx.fillStyle = '#fc0';}
  // // ctx.drawImage(blankImage, (i+1)*48,576);
  // // ctx.fillText(i,(i+1)*48+23,576+10);
  //}

  ctx.drawImage(selectorImage, 160,544);
  if(levelToLoad==levelsAvaible){ctx.fillStyle = '#f90';}
  else if(levelToLoad<levelsAvaible){ctx.fillStyle = '#2e2';}
  else {ctx.fillStyle='#e11';}
  ctx.fillText(levelToLoad,254,560);
  ctx.textAlign = "left";

  ctx.font = "16px Courier New";
  ctx.fillStyle='#e11';
  ctx.fillText(errorMsg,200,620);

  ctx.fillStyle = '#eee';
  ctx.fillText("Check out level editor at http://anrijs.jargans.com/murphy/editor.html", 160, canvas.height-20);



  if(32 in keysDown|| touchDown==1)
  {
  if(levelToLoad<=levelsAvaible)
  {
   loadGame(levelToLoad); 
  }
  else {errorMsg ="You can't play this level! You have to complete level "+levelsAvaible+' first!';}
  }
}

var drawBSOD   = function () 
{
  ctx.textBaseline = "top";
  var textLine=200;
  ctx.fillStyle = "#00A";
  ctx.fillRect(0, 0,canvas.width, canvas.height);

  ctx.fillStyle = "#AAA";
  ctx.fillRect((canvas.width/2)-64, (canvas.height/3),128, 20);
  ctx.font = "18px Courier New Bold";
  ctx.fillStyle = "#00A";
  ctx.fillText("Murphy ", (canvas.width/2)-60, (canvas.height/3));

  ctx.fillStyle = "#AAA";
  var textLine_BSOD=canvas.height/3+32;
  ctx.font = "16px Courier New Bold";
  if(murphy.hit==1&&murphy.win==0)
  {
    ctx.fillText("A fatal error has occurred with Murphy.", (canvas.width/4),textLine_BSOD);textLine_BSOD+=20;
    ctx.fillText("* You had collected "+murphy.infotrons+" out of "+requiredInfotrons+" infotrons.", (canvas.width/4),textLine_BSOD);textLine_BSOD+=20;textLine_BSOD+=20;
    textLine+=20;
    ctx.fillText("Press [Enter] to continiue", (canvas.width/3),textLine_BSOD);textLine_BSOD+=20;
  }
  else if(murphy.win==1)
  {
    ctx.fillText("No fatal error has occured at this time.", (canvas.width/4),textLine_BSOD);textLine_BSOD+=20;
    ctx.fillText("You have completed this level.", (canvas.width/4),textLine_BSOD);textLine_BSOD+=20;
    ctx.fillText("* You collected all ("+requiredInfotrons+") of required infotrons.", (canvas.width/4),textLine_BSOD);textLine_BSOD+=20;textLine_BSOD+=20;
    textLine+=20;
    ctx.fillText("Press [Enter] to continiue", (canvas.width/3),textLine_BSOD);textLine_BSOD+=20;
  }
 if(13 in keysDown)
  {bsod=0;}
}



// 1: Base 
// 2: Terminal
// 3: Exit
// 4: Orange Disk
// 5: Zonk
// 6: Infotron
// 7: Yellow disk
// 8: Red Disk
// 9: Murphy

// 10..14 Chip
// 15..25: Hardware

// 26: Snik-Snak
// 27: Electrons

// 28: Port 1
// 29: Port 2
// 30: Port 3
// 31: Port 4
// 32: Port 5
// 33: Port 6
// 34: Port 7
// 35: Port 8
// 36: Port 9
// 37: Port 10
// 38: Port 11

// 39..50: Bug
// 80..93:explosion to new explosion
// 101..114: Explosion
// 121..134: Exit