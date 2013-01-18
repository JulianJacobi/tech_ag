function addToplink() {
	var id = prompt("\'id\' der neuen Seite (bitte keine Leerzeichen sondern nur Unterstriche):", "");
	var title = prompt("Titel der neuen Seite (wenn m\u00f6glich nicht mehr als 12-13 Zeichen):", "");
	window.location.href = '../include/cms/cms_contentmanager_add_toppoint.php?id='+id+'&title='+title+'';
}
function addSublink(toppoint_link) {
	var id = prompt("\'id\' der neuen Seite (bitte keine Leerzeichen sondern nur Unterstriche):", "");
	var title = prompt("Titel der neuen Seite (wenn m\u00f6glich nicht mehr als 12-13 Zeichen):", "");
	window.location.href = '../include/cms/cms_contentmanager_add_subpoint.php?id='+id+'&title='+title+'&toppoint_link='+toppoint_link+'';
}