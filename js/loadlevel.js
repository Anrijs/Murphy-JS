 //Install all level objects

for(var i=0;i<19;i++)
{
  line[i]   = new Array();
}

  switch (gameLevel)
  {
    case 1: {include("levels/level01.js");break;}
    case 2: {include("levels/level02.js");break;}
    case 3: {include("levels/level03.js");break;}
    case 4: {include("levels/level04.js");break;}
    case 5: {include("levels/level05.js");break;}
  }

for(var i=0;i<objCount;i++)
{
  delete fallObject[i];
}



objCount=0;
for(var i=0;i<19;i++)
 {
   for(var j=0;j<32;j++)
   {
     switch (line[i][j])
     {
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
        case 7: {
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
     }
   }
 }
 isLoaded=1;
