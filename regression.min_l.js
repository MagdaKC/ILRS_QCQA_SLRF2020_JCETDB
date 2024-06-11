/**
* @license
*
* Regression.JS - Regression functions for javascript
* http://tom-alexander.github.com/regression-js/
* 
* copyright(c) 2013 Tom Alexander
* Licensed under the MIT license.
*
**/
!function(){"use strict";
var a=function(a,b)
{var c=0,d=0,e=0,f=0,g=0,h=a.length-1,i=new Array(b);
for(c=0;h>c;c++)
{for(f=c,d=c+1;h>d;d++)Math.abs(a[c][d])>Math.abs(a[c][f])&&(f=d);for(e=c;h+1>e;e++)g=a[e][c],a[e][c]=a[e][f],a[e][f]=g;for(d=c+1;h>d;d++)for(e=h;e>=c;e--)a[e][d]-=a[e][c]*a[c][d]/a[c][c]}
for(d=h-1;d>=0;d--){for(g=0,e=d+1;h>e;e++)
g+=a[e][d]*i[e];i[d]=(a[h][d]-g)/a[d][d]}
return i},
b={ 
linear:function(a){
for(var b=[0,0,0,0,0],c=0,d=[];c<a.length;c++)
a[c][1]&&(b[0]+=a[c][0],
b[1]+=a[c][1],
b[2]+=a[c][0]*a[c][0],
b[3]+=a[c][0]*a[c][1],
b[4]+=a[c][1]*a[c][1]);
for(var e=(c*b[3]-b[0]*b[1])/(c*b[2]-b[0]*b[0]),
f=b[1]/c-e*b[0]/c,
g=0,h=a.length;h>g;g++)
{var i=[a[g][0],a[g][0]*e+f];d.push(i)}
var j="y = "+e.toExponential(2)+"x + "+Math.round(100*f)/100;
return{equation:[e,f],points:d,string:j}},
//return{string:e,string:f}},


},
c=function(a,c,d){return"string"==typeof a?b[a](c,d):void 0};"undefined"!=typeof exports?module.exports=c:window.regressionL=c}();




