function showAnswerControls(id)
{
    $(".answer").hide();
    $("#text-area-"+id).show();
}
function showPostControls()
{
    $("#post-text-area").show();
}
function showNewPostTagsOptions()
{
    
}
function savePost()
{
    $("#new-post").submit();
}
