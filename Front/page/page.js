function getFiltered()
{
	var input, ad_list_element, title, filter, len;
	input = document.getElementById("searchIn");
	filter = input.value.toUpperCase();
	len = document.getElementsByClassName("ad").length;
    
    for(i = 0; i < len; i++)
	{
        ad_list_element = document.getElementsByClassName("ad")[i];
        title = ad_list_element.getElementsByTagName("h2")[0];
        // ^^^^^^ HERE SELECT THE THING THAT YOU WANT TO FILTER BY
        
		if(title.innerHTML.toUpperCase().indexOf(filter) > -1)
		{
			ad_list_element.style.display = "";
		}
		else
		{
			ad_list_element.style.display = "none";
		}
	}
}