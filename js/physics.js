/**
Bugs:

Stack fall to right

Atack not falling if top fallObject has object.id 1 near;

*/


if(murphy.hit==1)
{
  if(murphy.win!==1){explode(murphy.x-1,murphy.y-1);}
  line[murphy.y-1][murphy.x-1]=121;
  murphy.x=-5;murphy.y=-5;
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
        functionPushRight;
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

if(murphy_move==1&&murphy.hit!==1)
{
  if((line[my][mx+1]==-1&&murphy_direction==4&&murphy_distance>2)||(line[my][mx-1]==-1&&murphy_direction==3&&murphy_distance>2))
  {
    murphy.hit=1;
    explode(murphy.x-1,murphy.y-1);
  }
  functionMurphyMove();
}

if(murphy.isPushing!==0&&murphy)
{
  if(37 in keysDown || 39 in keysDown)
  {}
  else {murphy.isPushing=0;}
}