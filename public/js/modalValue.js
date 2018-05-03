// Récupération des informations dans les champs du modal bootstrap
$('#modalReport').on('show.bs.modal', function (event) 
{
	var button            = $(event.relatedTarget);
	var recipient         = button.data('whatever');
	var recipient_comment = button.data('comment');
	var modal             = $(this);

	modal.find('#reported_comment').val(strip_html_tags(recipient));
	modal.find('#recipient_comment').val(recipient_comment);
});

function strip_html_tags(str)
{
   	if ((str === null) || (str === '')) 
   	{
       return false;
   	}
  	else 
  	{
  		str = str.toString();
  		return str.replace(/<[^>]*>/g, '');
  	}
}