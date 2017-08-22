if((IEB==true)&&(scompat == "BackCompat" ))
{    
	fotoscwidth = 800;    
	fotoscheight=600;
}
else
{    
	fotoscwidth=400-2*(0);    
	fotoscheight=600-2*(0);
}
var fotosicwidth= '100%';
var fotosicheight=400-2*(0);
fotosDescCalcWidth=260;
fotosDescCalcHeight=80;
if((IEB==true)&&(scompat == "BackCompat" ))
{	
	fotosDescCalcIcWidth=fotosDescCalcWidth;	
	fotosDescCalcIcHeight=fotosDescCalcHeight;
}
else
{    
	fotosDescCalcIcWidth=fotosDescCalcWidth-2*(2)-2*(3);    
	fotosDescCalcIcHeight=fotosDescCalcHeight-2*(2)-2*(3);
}
fotoscwidth = '100%';    
fotoscheight = '100%';
fotosicwidth = '650';
fotosicheight = '100%';
fotosDescCalcIcWidth = '0';	
fotosDescCalcIcHeight = '0';

document.write('<div style="position:relative;width:'+fotoscwidth+'px;height:'+fotoscheight+'px;overflow:hidden;border-style:'+'solid'+';border-width:'+0+'px;border-color:#'+'000000'+';'+''+''+'">');

document.write('<div id="fotosdv"style="position:relative;width:'+fotosicwidth+'px;height:'+fotosicheight+'px;overflow:hidden;padding:0px;margin:0px;z-index:1;'+'FILTER:progid:DXImageTransform.Microsoft.Fade(Overlap=1.00,duration=2,enabled=false);'+'"'+' onfilterchange=fotosFadeBitti()'+'></div>');

for(i=0;i<quantidade;i++)
{	
	if(0==0)
	{
		fotosds=fotosds+fotoslinkstr[i];
		if(fotoslinkstr[i].length>quantidade)
		{
			CursorStr="pointer";
		}
		else
		{
			CursorStr="default";
		}
	}	
	fotosds=fotosds+'<div id="fotosdesc'+i+'"style="position:absolute;top:'+120+'px;left:'+10+'px;width:'+fotosDescCalcWidth+'px;height:'+fotosDescCalcHeight+'px;visibility:hidden;overflow:hidden;cursor:'+CursorStr+';z-index:20;">';	
	fotosds=fotosds+'<div style="position:absolute;left:0px;top:0px;width:'+fotosDescCalcWidth+'px;height:'+fotosDescCalcHeight+'px;border-style:solid;border-width:0px;border-color:#000000;background-color:#'+'000000'+';opacity: '+'0.50'+';filter:alpha(opacity='+'50'+');-moz-opacity:'+'0.50'+';"></div>';	
	fotosds=fotosds+'<div style="position:relative;left:0px;top:0px;width:'+fotosDescCalcIcWidth+'px;height:'+fotosDescCalcIcHeight+'px;overflow:hidden;padding:'+3+'px;text-align:'+'left'+';border-style:'+'solid'+';border-width:'+2+'px;border-color:#'+'990000'+';color:#'+'FFFFFF'+';font-family:'+'arial'+';font-style:'+'normal'+';font-size: '+'13px'+';font-weight:'+'normal'+';text-decoration:'+'none'+';opacity: 1.0;filter:alpha(opacity=100);-moz-opacity:1.0;">';		fotosds=fotosds+'<span style="color:#'+'FECE3F'+';font-family:'+'arial'+';font-style:'+'normal'+';font-size: '+'14px'+';font-weight:'+'bold'+';text-decoration:'+'none'+';">'+fotostitarr[i]+'</span><br />'+fotosdesarr[i];	
	fotosds=fotosds+'</div>';	
	fotosds=fotosds+'</div>';
	if(0==0)	{
		fotosds=fotosds+fotosclslinkstr[i];
	}	
}

document.write(''+fotosds);

function fotosShowCurrentDesc()
{	
	if((fotosdescgoster==1)&&( (fotostitarr[fotosrealcurrent].length>0) || (fotosdesarr[fotosrealcurrent].length>0)  ))	
	{		
		after_des=document.getElementById('fotosdesc'+fotosrealcurrent);		
		after_des.style.visibility="visible";		
	}
}

function fotosHideCurrentDesc()
{	
	before_des=document.getElementById('fotosdesc'+fotosvcurr);	
	before_des.style.visibility="hidden";
}

function fotosHighlightCurrTumb()
{	
	if((0==1)&&(0==0))	
	{	
		fotosbeforethumb=document.getElementById('fotosthumb'+fotosvcurr);		
		fotosafterthumb=document.getElementById('fotosthumb'+fotosrealcurrent);		
		fotosbeforethumb.style.borderColor='999999';		
		fotosafterthumb.style.borderColor='990000';	
	}
}

document.write('</div>');
function fotoszindx()
{	
	fotosobjn.style.visibility="visible";	
	fotosobjc.style.zIndex=2;	
	fotosobjn.style.zIndex=3;    
}
function fotosThumbOut(tobj,nm)
{	
	if((fotosvcurr==nm)&&(0==0)){}	
	else	
	{		
		tobj.style.borderColor='999999';	
	}
}

function fotosThumbOver(tobj,nm)
{	
	tobj.style.borderColor='990000';
}

function fotosSonrakiClick(c,n)
{	
	fotosvcurr=c;	
	fotosvnext=n;			
	fotosobjc=document.getElementById('fotosd'+fotosvcurr);	
	fotosobjn=document.getElementById('fotosd'+fotosvnext);
}

function fotosSonraki()
{	
	fotosvcurr=fotosvnext;	
	fotosvnext=fotosvnext+1;		
	if(fotosvnext>=quantidade)	
	{		
		fotosvnext=0;		
		fotostam=1;	
	}		
	fotosobjc=document.getElementById('fotosd'+fotosvcurr);	
	fotosobjn=document.getElementById('fotosd'+fotosvnext);		      
}


function fotosdevam(fm,pt)
{	
	if((fotosimgarr[fotosvnext].c==1)&&(fotosimgarr[fotosvcurr].c==1))	
	{		
		fotostimeo=setTimeout(fm+'()',pt);		
	}		
		else	
		{
			setTimeout('fotosdevam("'+fm+'")',500);
		}	
		var fotoscagain=1;	
		for(i=0;i<quantidade;i++)	
		{		
			if(fotosimgarr[i].c==1){}		
			else
			{
				fotoscagain=0;
			}	
		}	
	if(fotoscagain==1)
	{
		fotostam=1;
	}
}

function ThumbClick(clicked_img,tobj){	if(fotosjbtype==1){return;}	clearTimeout(fotostimeo);	fotosSonrakiClick(fotosrealcurrent,clicked_img);	if(fotosfademi==1)        {            if(IEB==true)            {		if(fotostam==0)		{	    		fotosdevam("fotosdotrans",4000);		}		else		{			fotosdotrans();		}            }            else            {		if(fotostam==0)		{    			fotosdevam("fotosbeftrans",4000);		}		else		{			fotosbeftrans();		}            }        }	else if(fotosfademi==2)	{		if(fotostam==0)		{ 			fotosdevam("fotosDoSlide",4000);		}		else		{			fotosDoSlide();		}	}	else if(fotosfademi==3)	{		if(fotostam==0)		{ 			fotosdevam("fotosDoScrollUp",4000);		}		else		{			fotosDoScrollUp();		}	}	else if(fotosfademi==4)	{		if(fotostam==0)		{ 			fotosdevam("fotosDoBlindX",4000);		}		else		{			fotosDoBlindX();		}	}	else if(fotosfademi==5)	{		if(fotostam==0)		{ 			fotosdevam("fotosDoBlindY",4000);		}		else		{			fotosDoBlindY();		}	}	}function fotossl(){fotosfademi=1;fotosvcurr=0;fotosvnext=0;fotosvssdiv=null;stepc=20*(2);fotosdif=0.00;fotosop=1.00;fotosdif=(1.00/stepc);dstr1='<div id="';dstr2='" style="position:absolute;visibility:hidden;'+'left:0px;top:0px;'+'padding:0px;margin:0px;overflow:hidden;">';dstr23='<table cellspacing="0" cellpadding="0" style="position:relative;left:0px;top:0px;padding:0px;margin:0px;"><tr><td style="width:'+fotosicwidth+'px;height:'+fotosicheight+'px;left:0px;top:0px;padding:0px;margin:0px;text-align:'+'center'+';vertical-align:'+'middle'+';">';dstr3='<img id="fotosimg';dstr4='" src="';dstr5='"  border="0" style="position:relative;border-style:'+'solid'+';border-width:'+'0'+'px;border-color:'+'#CCCCCC'+';'+""+'" alt=""></img>';dstr56='</td></tr></table>';dstr6='</div>';this.fotosdotrans=fotosdotrans;this.fotosinitte=fotosinitte;this.fotosinitte2=fotosinitte2;this.fotosbeftrans=fotosbeftrans;this.fotosdotransff=fotosdotransff;}function fotosFadeBitti(){	fotosjbtype=0;	fotosShowCurrentDesc();	}function fotosdotrans(){	fotosjbtype=1;	fotosHideCurrentDesc();	if(IEB==true){fotosvssdiv.filters[0].apply();}	fotosobjc.style.visibility="hidden";	fotosobjn.style.visibility="visible";	if(IEB==true){fotosvssdiv.filters[0].play();}	fotosrealcurrent=fotosvnext;	fotosHighlightCurrTumb();	fotosSonraki();			if(fotostam==0){fotosdevam("fotosdotrans",((1000*2)+4000));}	else	{		fotostimeo=setTimeout('fotosdotrans()',((1000*2)+4000));	} 	}function fotosdotransff(){	fotosop=fotosop-fotosdif;		if(fotosop<(0.00)){fotosop=0.00;}	fotosobjc.style.opacity = fotosop;	fotosobjn.style.opacity = 1.00-fotosop;	if(fotosop>(0.00))	{		setTimeout('fotosdotransff()',50);	}	else	{		fotosobjc.style.zIndex=2;		fotosobjn.style.zIndex=3;		fotosrealcurrent=fotosvnext;		fotosShowCurrentDesc();		fotosHighlightCurrTumb();				fotosSonraki();			        if(fotostam==0){fotosdevam("fotosbeftrans",4000);}        	else {fotostimeo=setTimeout('fotosbeftrans()',4000);}		fotosjbtype=0;  					}}function fotosbeftrans(){	fotosjbtype=1;	fotosHideCurrentDesc();    	fotosop=1.00;	fotosobjc.style.visibility="visible";	fotosobjn.style.visibility="visible";		fotosobjc.style.zIndex=3;	fotosobjn.style.zIndex=2;		fotosobjc.style.opacity = 1.00;		fotosobjn.style.opacity = 1.00;			fotosdotransff();	}function fotosDoSlide(){	fotosjbtype=1;	fotosHideCurrentDesc();	fotoskalan=fotoskalan-Math.ceil(fotoskalan/2);	fotosobjc.style.left=""+(fotoskalan-fotosicwidth)+"px";	fotosobjn.style.left=""+fotoskalan+"px";		if(fotoskalan<=0)	{		fotosrealcurrent=fotosvnext;		fotosShowCurrentDesc();		fotosHighlightCurrTumb();    		fotosSonraki();		fotoskalan=fotosicwidth;		fotosobjn.style.left=""+fotoskalan+"px";	        		fotoszindx();          		fotosjbtype=0;        		if(fotostam==0){fotosdevam("fotosDoSlide",4000);}		else {fotostimeo=setTimeout('fotosDoSlide()',4000);}	}	else	{		setTimeout('fotosDoSlide()',50);    	} }function fotosDoScrollUp(){	fotosjbtype=1;	fotosHideCurrentDesc();	fotoskalan=fotoskalan-Math.ceil(fotoskalan/2);	fotosobjc.style.top=""+(fotoskalan-fotosicheight)+"px";	fotosobjn.style.top=""+fotoskalan+"px";	    if(fotoskalan<=0)    {	fotosrealcurrent=fotosvnext;	fotosShowCurrentDesc();	fotosHighlightCurrTumb();        fotosSonraki();        fotoskalan=fotosicheight;	fotosobjn.style.top=""+fotoskalan+"px";	        fotoszindx();                 	fotosjbtype=0;        if(fotostam==0){fotosdevam('fotosDoScrollUp',4000);}        else{fotostimeo=setTimeout('fotosDoScrollUp()',4000);}        }    else    {        setTimeout('fotosDoScrollUp()',50);        }}function fotosDoBlindX(){	fotosjbtype=1;	fotosHideCurrentDesc();   	fotoskalan=fotoskalan-Math.ceil(fotoskalan/2);	fotosobjc.style.left=""+(fotosicwidth-fotoskalan)+"px";	fotosobjn.style.left=""+fotoskalan+"px";	    if(fotoskalan<=0)    {		fotosrealcurrent=fotosvnext;		fotosShowCurrentDesc();	fotosHighlightCurrTumb();            fotosSonraki();        fotoskalan=fotosicwidth;	fotosobjn.style.left=""+fotoskalan+"px";		    	        fotoszindx();	fotosjbtype=0;                  if(fotostam==0){fotosdevam("fotosDoBlindX",4000);}        else{fotostimeo=setTimeout('fotosDoBlindX()',4000);}    }    else    {        setTimeout('fotosDoBlindX()',50);        }}function fotosDoBlindY(){	fotosjbtype=1;	fotosHideCurrentDesc();  	fotoskalan=fotoskalan-Math.ceil(fotoskalan/2);	fotosobjc.style.top=""+(fotosicheight-fotoskalan)+"px";	fotosobjn.style.top=""+fotoskalan+"px";	    if(fotoskalan<=0)    {		fotosrealcurrent=fotosvnext;		fotosShowCurrentDesc();fotosHighlightCurrTumb();        fotosSonraki();        fotoskalan=fotosicheight;	    fotosobjn.style.top=""+fotoskalan+"px";                fotoszindx();                 	fotosjbtype=0;        if(fotostam==0){fotosdevam("fotosDoBlindY",4000);}        else{fotostimeo=setTimeout('fotosDoBlindY()',4000);}        }    else    {        setTimeout('fotosDoBlindY()',50);        } }function fotosinitte2(){	fotosthumbs_obj=document.getElementById('fotosthumbsid');	fotosmoving_obj=document.getElementById('fotosmovingdiv');	fotosvssdiv=document.getElementById("fotosdv");	if(2>0)	{		fotosobjc=document.getElementById('fotosd'+0);			fotosobjc.style.visibility="visible";		}	if(2>1)	{		fotosvcurr=0;		fotosvnext=0;		fotosrealcurrent=0;        if(fotosfademi==0)        {			fotosvcurr=0;			fotosvnext=1;			fotosrealcurrent=0;			setTimeout('fotosdotrans()',4000);                }        else if(fotosfademi==1)        {            if(IEB==true)            {	    		fotosSonraki();			fotosShowCurrentDesc();			fotosHighlightCurrTumb();	    		fotosdevam("fotosdotrans",4000);                       }            else            {	    		fotosSonraki();			fotosShowCurrentDesc();			fotosHighlightCurrTumb();	    		fotosdevam("fotosbeftrans",4000);                        }        }         else if(fotosfademi==2)        {		fotoskalan=fotosicwidth;     		fotosSonraki();		fotosrealcurrent=0;		fotosShowCurrentDesc();		fotosHighlightCurrTumb();		fotosobjn.style.left=""+fotoskalan+"px";          			fotoszindx();            		fotosdevam("fotosDoSlide",4000);		   	                }        else if(fotosfademi==3)        {		fotoskalan=fotosicheight;            		fotosSonraki();		fotosrealcurrent=0;		fotosShowCurrentDesc();		fotosHighlightCurrTumb();		fotosobjn.style.top=""+fotoskalan+"px";            			fotoszindx();                        		fotosdevam("fotosDoScrollUp",4000);               }                  else if(fotosfademi==4)        {                        fotoskalan=fotosicwidth;                        fotosSonraki();		fotosrealcurrent=0;		fotosShowCurrentDesc();fotosHighlightCurrTumb();        	fotosobjn.style.left=""+fotoskalan+"px";	            	            fotoszindx();                                   fotosdevam("fotosDoBlindX",4000);                 }            else if(fotosfademi==5)        {                        fotoskalan=fotosicheight;                        fotosSonraki();		fotosrealcurrent=0;		fotosShowCurrentDesc();fotosHighlightCurrTumb();        	fotosobjn.style.top=""+fotoskalan+"px";            	            fotoszindx();                                  fotosdevam("fotosDoBlindY",4000);                 }												}}function fotosinitte(){	i=0;	innertxt="";	


for(i=0;i<quantidade;i++)	
{		
	innertxt=innertxt+dstr1+"fotosd"+i+dstr2+dstr23+fotoslinkstr[i]+dstr3+i+dstr4+fotosimgstr[i]+dstr5+fotosclslinkstr[i]+dstr56+dstr6;	
}	

spage=document.getElementById('fotosdv');	
spage.innerHTML=""+innertxt;    
setTimeout('fotosinitte2()',100);
}
function fotosBas()
{        
	fotoss=new fotossl();        
	fotoss.fotosinitte();
}
setTimeout('fotosBas()',100);