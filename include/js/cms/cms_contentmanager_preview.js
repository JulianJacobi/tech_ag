function openPreview() {
	var headline = document.getElementById('cms_content_headline').value;
	var content = document.getElementById('cms_content_content').value;
	
	preview.location.href = "../preview.php?headline="+headline+"&content="+content;
}