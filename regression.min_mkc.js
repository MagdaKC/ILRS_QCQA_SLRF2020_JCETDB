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
!function(){"use strict";var a=function(a,b){var c=0,d=0,e=0,f=0,g=0,h=a.length-1,i=new Array(b);for(c=0;h>c;c++){for(f=c,d=c+1;h>d;d++)Math.abs(a[c][d])>Math.abs(a[c][f])&&(f=d);for(e=c;h+1>e;e++)g=a[e][c],a[e][c]=a[e][f],a[e][f]=g;for(d=c+1;h>d;d++)for(e=h;e>=c;e--)a[e][d]-=a[e][c]*a[c][d]/a[c][c]}for(d=h-1;d>=0;d--){for(g=0,e=d+1;h>e;e++)g+=a[e][d]*i[e];i[d]=(a[h][d]-g)/a[d][d]}return i},
b={
linear:function(a){for(var b=[0,0,0,0,0],c=0,d=[];c<a.length;c++)a[c][1]&&(b[0]+=a[c][0],b[1]+=a[c][1],b[2]+=a[c][0]*a[c][0],b[3]+=a[c][0]*a[c][1],b[4]+=a[c][1]*a[c][1]);for(var e=(c*b[3]-b[0]*b[1])/(c*b[2]-b[0]*b[0]),f=b[1]/c-e*b[0]/c,g=0,h=a.length;h>g;g++){var i=[a[g][0],a[g][0]*e+f];d.push(i)}
//var j="y = "+e.toExponential(2)+"x + "+Math.round(100*f)/100;
var j=""+e.toExponential(2)+","+Math.round(100*f)/100;
//return{points:e,string:j}},
return{equation:[e,f],points:d,string:j}},
exponential:function(a){var b=[0,0,0,0,0,0],c=0,d=[];for(i=a.length;i>c;c++)a[c][1]&&(b[0]+=a[c][0],b[1]+=a[c][1],b[2]+=a[c][0]*a[c][0]*a[c][1],b[3]+=a[c][1]*Math.log(a[c][1]),b[4]+=a[c][0]*a[c][1]*Math.log(a[c][1]),b[5]+=a[c][0]*a[c][1]);for(var e=b[1]*b[2]-b[5]*b[5],f=Math.pow(Math.E,(b[2]*b[3]-b[5]*b[4])/e),g=(b[1]*b[4]-b[5]*b[3])/e,h=0,i=a.length;i>h;h++){var j=[a[h][0],f*Math.pow(Math.E,g*a[h][0])];d.push(j)}var k="y = "+Math.round(100*f)/100+"e^("+Math.round(100*g)/100+"x)";return{equation:[f,g],points:d,string:k}},
/logarithmic:function(a){var b=[0,0,0,0],c=0,d=[];for(h=a.length;h>c;c++)a[c][1]&&(b[0]+=Math.log(a[c][0]),b[1]+=a[c][1]*Math.log(a[c][0]),b[2]+=a[c][1],b[3]+=Math.pow(Math.log(a[c][0]),2));for(var e=(c*b[1]-b[2]*b[0])/(c*b[3]-b[0]*b[0]),f=(b[2]-e*b[0])/c,g=0,h=a.length;h>g;g++){var i=[a[g][0],f+e*Math.log(a[g][0])];d.push(i)}var j="y = "+Math.round(100*f)/100+" + "+Math.round(100*e)/100+" ln(x)";return{equation:[f,e],points:d,string:j}},
 power:function(a){var b=[0,0,0,0],c=0,d=[];for(h=a.length;h>c;c++)a[c][1]&&(b[0]+=Math.log(a[c][0]),b[1]+=Math.log(a[c][1])*Math.log(a[c][0]),b[2]+=Math.log(a[c][1]),b[3]+=Math.pow(Math.log(a[c][0]),2));for(var e=(c*b[1]-b[2]*b[0])/(c*b[3]-b[0]*b[0]),f=Math.pow(Math.E,(b[2]-e*b[0])/c),g=0,h=a.length;h>g;g++){var i=[a[g][0],f*Math.pow(a[g][0],e)];d.push(i)} var j="y = "+Math.round(100*f)/100+"x^"+Math.round(100*e)/100;return{equation:[f,e],points:d,string:j}},
polynomial:function(b,c){"undefined"==typeof c&&(c=2);for(var d=[],e=[],f=[],g=0,h=0,i=0,j=c+1;j>i;i++){for(var k=0,l=b.length;l>k;k++)b[k][1]&&(g+=Math.pow(b[k][0],i)*b[k][1]);d.push(g),g=0;for(var m=[],n=0;j>n;n++){for(var k=0,l=b.length;l>k;k++)b[k][1]&&(h+=Math.pow(b[k][0],i+n));m.push(h),h=0}e.push(m)}e.push(d);for(var o=a(e,j),i=0,l=b.length;l>i;i++){for(var p=0,q=0;q<o.length;q++)p+=o[q]*Math.pow(b[i][0],q);f.push([b[i][0],p])} for(var r="y = ",i=o.length-1;i>=0;i--)r+=i>1?Math.round(100*o[i])/100+"x^"+i+" + ":1==i?Math.round(100*o[i])/100+"x + ":Math.round(100*o[i])/100;return{equation:o,points:f,string:r}},
lastvalue:function(a){for(var b=[],c=null,d=0;d<a.length;d++)a[d][1]?(c=a[d][1],b.push([a[d][0],a[d][1]])):b.push([a[d][0],c]);return{equation:[c],points:b,string:""+c}}
},
c=function(a,c,d){return"string"==typeof a?b[a](c,d):void 0};"undefined"!=typeof exports?module.exports=c:window.regression=c}();
