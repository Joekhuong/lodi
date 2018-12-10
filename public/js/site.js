$(document).ready(function(){
    $(document).on('click','#idol-search-btn',function(){
        let search_text = $('#idol-search-txt').val();

        if(search_text.length == 0)
        {
            return false;
        }

        window.location.href = window.search_url+'?name='+search_text;
    })
});