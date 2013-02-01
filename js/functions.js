 function include(filename)
{
  var head = document.getElementsByTagName('body')[0];
  
  script = document.createElement('script');
  script.src = filename;
  script.type = 'text/javascript';
  
  head.appendChild(script);
}

function getMousePos(canvas, evt) {
        var rect = canvas.getBoundingClientRect();
        return {
          x: evt.clientX - rect.left,
          y: evt.clientY - rect.top
        };
      }

function functionPushRight(i,cx,cy)
{
  if(fallObject[i].fallDistance==0)
          {fallObject[i].xoffset+=fallSpeed;}
        if(fallObject[i].fallDistance<8)
        {
          fallObject[i].xoffset+=fallSpeed;
          fallObject[i].fallDistance++;
        }
        else
        {
          fallObject[i].fallDistance=0;
          fallObject[i].x++;
          fallObject[i].xoffset=0;
          fallObject[i].isPushed=0;
          line[cy][cx+1]=fallObject[i].id;
          line[cy][cx]=0;
      }
}

function functionPushLeft(i,cx,cy)
{
  if(fallObject[i].fallDistance==0)
          {fallObject[i].xoffset-=fallSpeed;}
        if(fallObject[i].fallDistance<8)
        {
          fallObject[i].xoffset-=fallSpeed;
          fallObject[i].fallDistance++;
        }
        else
        {
          line[cy][cx-1]=fallObject[i].id;
          fallObject[i].fallDistance=0;
          fallObject[i].x--;
          fallObject[i].xoffset=0;
          fallObject[i].isPushed=0;
          line[cy][cx]=0;
      }
}

function functionPushDown(i,cx,cy)
{
  if(fallObject[i].fallDistance<9)
        {
          fallObject[i].yoffset+=fallSpeed;
          fallObject[i].fallDistance++;
        }
        else
        {
          fallObject[i].fallDistance=0;
          fallObject[i].y++;
          fallObject[i].yoffset=0;
          fallObject[i].isPushed=0;
          line[cy+1][cx]=fallObject[i].id;
          line[cy][cx]=0;
      }
}

function functionPushUp(i,cx,cy)
{
if(fallObject[i].fallDistance<9)
        {
          fallObject[i].yoffset-=fallSpeed;
          fallObject[i].fallDistance++;
        }
        else
        {
          fallObject[i].fallDistance=0;
          fallObject[i].y--;
          fallObject[i].yoffset=0;
          fallObject[i].isPushed=0;
          line[cy-1][cx]=fallObject[i].id;
          line[cy][cx]=0;
      }
}

function functionFallRight(i,cx,cy)
{
  if((fallObject[i].fallDistance>=4&&line[cy+1][cx+1]!==0)||line[cy-1][cx-1]==-1)
          {
            //wait;
           // line[cy][cx]=-1;
          }
        else if(fallObject[i].fallDistance<9)
        {
          fallObject[i].xoffset+=fallSpeed;
          fallObject[i].fallDistance++;
        }
        else
        {
          line[cy+1][cx+1]=0;
          line[cy][cx+1]=fallObject[i].id;
          fallObject[i].fallDistance=0;
          fallObject[i].x++;
          fallObject[i].xoffset=0;
          fallObject[i].isPushed=0;
          line[cy][cx]=0;
      }
}

function functionFallLeft(i,cx,cy)
{
 if((fallObject[i].fallDistance>=4&&line[cy+1][cx-1]!==0)||line[cy-1][cx+1]==-1)
          {
            //wait;
            //line[cy][cx]=-1;
          }
        else if(fallObject[i].fallDistance<=9)
        {
          fallObject[i].xoffset-=fallSpeed;
          fallObject[i].fallDistance++;
        }
         else
        {
          line[cy+1][cx-1]=0;
          line[cy][cx-1]=fallObject[i].id;
          fallObject[i].fallDistance=0;
          fallObject[i].x--;
          fallObject[i].xoffset=0;
          fallObject[i].isPushed=0;
          line[cy][cx]=0;
      }
}

function fallFunction(i,cx,cy)
{

  if(fallObject[i].fallDistance<10)
  {
    fallObject[i].yoffset+=fallSpeed;
    fallObject[i].fallDistance++;
  }
  else
  {  
      var mx = murphy.x-1;
      var my = murphy.y-1;

      line[cy][cx]=0;
      fallObject[i].isFalling=0;
      fallObject[i].fallDistance=0;
      fallObject[i].y++;
      if((mx==cx&&(my==cy+1||my==cy+2))&&(line[my][mx+1]!==9||line[my][mx-1]!==9))
      {
        if(fallObject[i].yoffset-murphy.yoffset-1>=-0.5&&(murphy.xoffset<=0.1&&murphy.xoffset>=-0.1))
        {
          murphy.hit=1;
          explode(murphy.x-1,murphy.y-1);
        }
      } 
      if(line[cy+2][cx]==4) {explode(cx,cy+2);}
      fallObject[i].yoffset=0;
      line[cy+1][cx]=fallObject[i].id; // set grid value to 0;
      if(fallObject[i].id==4&&line[cy+2][cx]!==0&&line[cy+2][cx]!==9&&(line[cy+2][cx]<80||line[cy+2][cx]>114)){fallObject[i].x=-1;explode(cx,cy+1);}
  }
}

function getEnvrioment(i,cx,cy)
{
  if(fallObject[i].isPushed==0&&fallObject[i].isFalling==0&&fallObject[i].gravity==1)
  {
    if(line[cy+1][cx]==0) //Get whats below
    {
      fallObject[i].isFalling=1;
      line[cy+1][cx]=-1;
    }
    else if(line[cy+1][cx]==5||line[cy+1][cx]==6||line[cy+1][cx]==10||line[cy+1][cx]==11||line[cy+1][cx]==12||line[cy+1][cx]==13||line[cy+1][cx]==14||line[cy+1][cx]==13) //Get whats in sides
    {
      //Check if sides are free
      if(line[cy][cx+1]==0&&line[cy+1][cx+1]==0&&(fallObject[i].id==5||fallObject[i].id==6))    // Right side
      {
        fallObject[i].isPushed=3;
        line[cy][cx+1]=fallObject[i].id;
      }
      else if(line[cy][cx-1]==0&&line[cy+1][cx-1]==0&&(fallObject[i].id==5||fallObject[i].id==6))  //Left side
      {
        fallObject[i].isPushed=4;
        line[cy][cx-1]=fallObject[i].id;
      }
    }
    
  }

    if(line[cy+1][cx]==0&&fallObject[i].isPushed==0&&fallObject[i].gravity==1)
    {
      if(line[cy+1][cx]!==-1&&line[cy+1][cx]==0)
      {
        fallObject[i].isFalling=1;
        line[cy+1][cx]=-1;
      } // Set object for fall;
       // set grid value to 0;
    }
}
function functionMurphyPull(murphy_direction)
{
  var mx = murphy.x-1;
  var my = murphy.y-1;
  if(37 in keysDown||38 in keysDown||39 in keysDown||40 in keysDown)
  {}
  else murphy_direction=0;
  switch(murphy_direction)
  {
case 1://eat UP
        {
          if(line[my-1][mx]==6)
          {
            for(var i=0;i<objCount;i++)
            {
              if(fallObject[i].x==mx&&fallObject[i].y==my-1)
              {
                fallObject[i].x=-5;
                line[my-1][mx]=0;
                if(fallObject[i].id==6)
                {
                  murphy.infotrons++;
                }
              }
            }
          }
          else if(line[my-1][mx]==1)
          {
                line[my-1][mx]=0;
          }
          else if(line[my-1][mx]==8)
          {
            line[my-1][mx]=0;
            redDisks++;
          }
          else if(line[my-1][mx]>=29&&line[my-1][mx]<=31)
            { line[my-1][mx]=0;}
          else if(line[my-1][mx]>32&&line[my-1][mx]<41)
            {explode(mx,my);}
          break;
        }
  case 2: //eat DOWN
    {
      if(line[my+1][mx]==6)
      {
        for(var i=0;i<objCount;i++)
        {
          if(fallObject[i].x==mx&&fallObject[i].y==my+1&&fallObject[i].isFalling==0)
          {
            fallObject[i].x=-5;
            line[my+1][mx]=0;
            if(fallObject[i].id==6)
            {
              murphy.infotrons++;
            }
          }
        }
      }
      else if(line[my+1][mx]==1)
      {
            line[my+1][mx]=0;
      }
       else if(line[my+1][mx]==8)
      {
          redDisks++;
          line[my+1][mx]=0;
      }
      else if(line[my+1][mx]>=29&&line[my+1][mx]<=31)
        { line[my+1][mx]=0;}
      else if(line[my+1][mx]>32&&line[my+1][mx]<41)
        {explode(mx,my);}
      break;
    }
case 3:
    {
      if(line[my][mx-1]==6)
      {
        for(var i=0;i<objCount;i++)
        {
          if(fallObject[i].x==mx-1&&fallObject[i].y==my&&fallObject[i].isFalling==0&&line[my+1][mx-1]>0)
          {
            fallObject[i].x=-5;
            line[my][mx-1]=0;
            if(fallObject[i].id==6)
            {
              murphy.infotrons++;
            }
          }
        }
      }
      else if(line[my][mx-1]==1)
      {
            line[my][mx-1]=0;
      }
      else if(line[my][mx-1]==8)
      {
            redDisks++;
            line[my][mx-1]=0;
      }
      else if(line[my][mx-1]>=29&&line[my][mx-1]<=31)
        { line[my][mx-1]=0;}
      else if(line[my][mx-1]>32&&line[my][mx-1]<41)
        {explode(mx,my);}
      break;
    }
  case 4:
    {
      if(line[my][mx+1]==6)
      {
        for(var i=0;i<objCount;i++)
        {
          if(fallObject[i].x==mx+1&&fallObject[i].y==my&&fallObject[i].isFalling==0&&line[my+1][mx+1]>0)
          {
            fallObject[i].x=-5;
            line[my][mx+1]=0;
            if(fallObject[i].id==6)
            {
              murphy.infotrons++;
            }
          }
        }
      }
      else if(line[my][mx+1]==1)
      {
            line[my][mx+1]=0;
      }
      else if(line[my][mx+1]==8)
      {
        redDisks++;
            line[my][mx+1]=0;
      }
       else if(line[my][mx+1]>=29&& line[my][mx+1]<=31)
        { line[my][mx+1]=0;}
      else if(line[my][mx+1]>32&&line[my][mx+1]<41)
        {explode(mx,my);}
    }
    break;
  }
}

function functionMurphyPush(i)
{
  var mx = murphy.x-1;
  var my = murphy.y-1;
  if(line[my+1][mx]!==-1&&line[my+1][mx]!==0&&line[my+1][mx]!==1&&line[my+1][mx]!==30&&line[my+1][mx]!==29&&line[my+1][mx]!==31&&line[my+1][mx]!==6&&line[my+1][mx]!==8&&murphy_direction==2) 
    {
      if(line[my+1][mx]==7&&line[my+2][mx]==0)
      {
        for(var i=0;i<objCount;i++)
        {
          if(fallObject[i].x==mx&&fallObject[i].y==my+1)
          {
          fallObject[i].isPushed=5;
          }
        }
      }
      else {murphy_move=0;murphy_distance=0;}
    }
    
  if(line[my-1][mx]!==-1&&line[my-1][mx]!==0&&line[my-1][mx]!==1&&line[my-1][mx]!==30&&line[my-1][mx]!==29&&line[my-1][mx]!==31&&line[my-1][mx]!==6&&line[my-1][mx]!==8&&murphy_direction==1) 
    {if(line[my-1][mx]==7&&line[my-2][mx]==0)
      {
        for(var i=0;i<objCount;i++)
        {
          if(fallObject[i].x==mx&&fallObject[i].y==my-1)
          {
          fallObject[i].isPushed=6;
          }
        }
      }
      else {murphy_move=0;murphy_distance=0;}
    }

  if(line[my][mx+1]!==-1&&line[my][mx+1]!==0&&line[my][mx+1]!==1&&line[my][mx+1]!==30&&line[my][mx+1]!==29&&line[my][mx+1]!==31&&line[my][mx+1]!==6&&line[my][mx+1]!==8&&murphy_direction==4) 
    {
      if(line[my][mx+2]==0&&(line[my][mx+1]==5||line[my][mx+1]==4))
      {
        for(var i=0;i<objCount;i++)
        {
          if(fallObject[i].x==mx+1&&fallObject[i].y==my)
          {
            var lx = fallObject[i].x;
            var ly = fallObject[i].y;

            if(line[ly+1][lx]!==0&&fallObject[i].isFalling==0)
            {fallObject[i].isPushed=1;murphy.isPushing=1;}
            else {murphy_move=0;}
          }
        }
      }
      else if(line[my][mx+2]==0&&line[my][mx+1]==7)
      {
        for(var i=0;i<objCount;i++)
        {
          if(fallObject[i].x==mx+1&&fallObject[i].y==my)
          {
          fallObject[i].isPushed=1;murphy.isPushing=1;
          }
        }
      }
      else
      {
        murphy_move=0;
        murphy_distance=0;
      }
    }
  if(line[my][mx-1]!==-1&&line[my][mx-1]!==0&&line[my][mx-1]!==1&&line[my][mx-1]!==30&&line[my][mx-1]!==29&&line[my][mx-1]!==31&&line[my][mx-1]!==6&&line[my][mx-1]!==8&&murphy_direction==3) 
    {
      if(line[my][mx-2]==0&&(line[my][mx-1]==5||line[my][mx-1]==4))
      {
        for(var i=0;i<objCount;i++)
        {
          if(fallObject[i].x==mx-1&&fallObject[i].y==my)
          {
            var lx = fallObject[i].x;
            var ly = fallObject[i].y;

            if(line[ly+1][lx]!==0&&fallObject[i].isFalling==0)
            {fallObject[i].isPushed=2;murphy.isPushing=2;}
            else {murphy_move=0;}
          }
        }
      }
      else if(line[my][mx-2]==0&&line[my][mx-1]==7)
      {
        for(var i=0;i<objCount;i++)
        {
          if(fallObject[i].x==mx-1&&fallObject[i].y==my)
          {
          fallObject[i].isPushed=2;murphy.isPushing=2;
          }
        }
      }
      else
      {
        murphy_move=0;
        murphy_distance=0;
      }
    }
}

function functionMurphyMove()
{


  if(murphy_distance<9)
    {
      murphy_distance++;
      switch (murphy_direction)
      {
        case 1: {murphy.yoffset-=moveSpeed; break;}
        case 2: {murphy.yoffset+=moveSpeed; break;}
        case 3: {murphy.xoffset-=moveSpeed; break;}
        case 4: {murphy.xoffset+=moveSpeed; break;}
      }
    }
    else
    {
      line[murphy.y-1][murphy.x-1]=0;
      murphy.x+=Math.round(murphy.xoffset);
      murphy.y+=Math.round(murphy.yoffset);
      if(line[murphy.y-1][murphy.x-1]==6)
        {
          for(var i=0;i<objCount;i++)
          {
            if(fallObject[i].id==6&&fallObject[i].x==murphy.x-1&&fallObject[i].y==murphy.y-1)
            {
              fallObject[i].id=0;
              fallObject[i].x=-5;
              murphy.infotrons++;
             }
          }
        }
        else if (line[murphy.y-1][murphy.x-1]==8)
        {
          redDisks++;
        }
      line[murphy.y-1][murphy.x-1]=9;
      murphy.xoffset = 0;
      murphy.yoffset = 0;


      
      if(touchDown==0)
      {
        murphy_move=0;
        murphy_distance=0;
        murphy_direction=0;
      }
     else
     {
        murphy_move=1;
        murphy_distance=0;
     }
     if(murphy_direction_changed==1)
      {
        murphy_direction=murphy_direction_move;
        murphy_direction_changed=0;
      }
    }
}

function plantDisk(x,y)
{
  diskDelay = Date.now()+1000;
  diskIsPlanted=1;
  diskX=x;
  diskY=y;
  line[y][x]=4;
}