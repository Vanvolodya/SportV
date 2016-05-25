
"use strict";

// hide local variables scope
(function()
{
	// jQuery-style notation
	var $ = function (a) { return document.getElementById(a);}

    var myitems = [ {name:"Ноутбук Lenovo IdeaPad 100-14",icon:"lenovoIdeaPad10014.jpg", desc:"Екран 14 (1366x768) HD LED, глянцевий / Intel Celeron N2840 (2.16 - 2.58 ГГц) / RAM 2 ГБ / HDD 500 ГБ / Intel HD Graphics / LAN / Wi-Fi / веб-камера / DOS / 1.9 кг / чорний", price:5999},
					{name:"Ноутбук HP 255 G4",icon:"HP255G4.jpg", desc:"Екран 15.6 (1366x768) HD LED, матовий / AMD Dual-Core E1-6015 (1.4 ГГц) / RAM 2 ГБ / HDD 500 ГБ / AMD Radeon R2 / LAN / Wi-Fi / Bluetooth / веб-камера / Linux / 2.15 кг / чорний", price:6099},
					{name:"Ноутбук Dell Inspiron 3542",icon:"DellInspiron3542.jpg", desc:"Екран 15.6 (1366x768) WXGA HD LED, глянцевий / Intel Celeron 2957U (1.4 ГГц) / RAM 2 ГБ / HDD 500 ГБ / Intel HD Graphics / DVD Super Multi / LAN / Wi-Fi / Bluetooth 4.0 / веб-камера / Linux / 2.4 кг / чорний", price:6777} ];
 
	var calculatePrice = function()
	{
		 var price = 0;
		 var atLeastOneIsSelected = false;
		 for(var i in myitems)
		 {
			 var checkid = "itemcheck_"+i;
			 if ($(checkid).checked) { price += myitems[i].price; atLeastOneIsSelected = true; }
		 }
		 return [price, atLeastOneIsSelected];
	}
 
    var selection_change_f = function()
    {
		var price = calculatePrice();// [price, is_selected]
		$("totalprice").innerHTML = "Сума замовлення: " + price[0].toFixed(2) + " грн.";
		$("buybutton").disabled = !price[1];
    }
	
	$("buybutton").onclick = function()
	{
		$('dialogprice').innerHTML = calculatePrice()[0].toFixed(2);
		$('buydialog').style.display='block';
	}

    var itemcontainer = $("itemcontainer");
	itemcontainer.innerHTML = '<hr>';

    for(var i in myitems)
    {
        var item = myitems[i];
        item.price = Number.parseFloat(item.price); // make sure it is a number

        var nameid = "itemname_"+i;
        var textid = "itemtext_"+i;
        var checkid = "itemcheck_"+i;

        itemcontainer.innerHTML +=	'<div class="w3-row"><div class="w3-col s4 m2">' +
									'<img src="' + item.icon + '" style="width:100%"></img></div>' +
									'<div class="w3-col s8 m7 w3-container"><h3 id="'+nameid+'"></h3>' +
									'<p id="'+textid+'"></p></div><div class="w3-col s12 m3 w3-container">' +
									'<h3><input id="' + checkid + '" type="checkbox"></input>&nbsp;'+item.price+' UAH</h3></div></div><hr>';

        $(nameid).appendChild(document.createTextNode(item.name));
        $(textid).appendChild(document.createTextNode(item.desc));
    }
	
	for(var i in myitems)
	{
		$("itemcheck_"+i).onchange = selection_change_f;
	}
	
	selection_change_f();
})();

