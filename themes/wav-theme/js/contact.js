$('.submit-btn').on('click', function (event) {
    event.preventDefault();
    var title = $('#quote-author').val();
    var quote = $('#quote-content').val();
    var source = $('#quote-source').val();
    var sourceUrl = $('#quote-source-url').val();

$.ajax({
    method: 'post',
    url: api_vars.root_url + 'wp/v2/posts/',
    data: {
      title: title,
      content: quote,
      _qod_quote_source: source,
      _qod_quote_source_url: sourceUrl,
      status: "pending"
    },
    beforeSend: function (xhr) {
      xhr.setRequestHeader('X-WP-Nonce', api_vars.nonce);
    }
  }).done(function () {
    $('#quote-submission-form').hide('slow');
    $('.entry-title').after('<p>' + api_vars.success+ '</p>');

  }).fail(function() {
    alert(api_vars.failure);
  });
}); 