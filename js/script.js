"use strict"

function onAppelAjax() 
{  
    $.get("./ajax.php", displayComment);
}

function onAppelAjax2()
{
   let search = $("#search").val();
   if (search.length > 0) 
   {
       $.get(
           "./search.php",
           "search="+search,
           displayArticle
        );
   } if (search.length > 0) 
   {
      $.get(
           "./searchCat.php",
           "search="+search,
           displayCategory
        );
   } if (search.length > 0) 
   {
      $.get(
           "./searchAut.php",
           "search="+search,
           displayAuthor
        );
   } else 
   {
       $("#searchResult").empty();
   }
}



function displayComment(comments) 
{
    comments = JSON.parse(comments)
    $("#comments").empty();
    for (let comment of comments) 
    {
        $("#comments").append(
            `<div class="card p-3 m-4">
            <h4 class="post-title font-weight-bold text-primary">${comment[0]} ${comment[1]}</h2>
            <a href="detail.php?id_article=${comment[4]}">${comment[5]}</a>
            <p class="m-0"><small>${comment[3]}</small></p>
            <p>${comment[2]}</p>
            </div>
        `);
    }
}

function displayArticle(articles) 
{
    $("#searchResult").empty();
    articles = JSON.parse(articles)
    for (let i = 0; i < articles.length; i++) 
    {
        console.log(articles[i])
        $('#searchResult').append(`
                                <div class="post-preview">
                                    <a href="detail.php?id_article=${articles[i][0]}">
                                        <h2 class="post-title">${articles[i][1]}</h2>
                                        <h3 class="post-subtitle">${articles[i][4]}</h3>
                                        <p><em>${articles[i][2]} ${articles[i][3]}</em></p>
                                        <p><em>${articles[i][5]}</em></p>
                                    </a>
                                    <p class="post-meta">
                                        <a href="detail.php?id_article=${articles[i][0]}">${articles[i][6].substring(0, 150)}...</a>
                                    </p>
                                </div>
                                `)
    }
}   

function displayCategory(category) 
{
    $("#searchResult").empty();
    category = JSON.parse(category);
    for (let i = 0; i < category.length; i++) 
    {
        console.log(category[i])
        $('#searchResult').append(`
                                <div class="post-preview">
                                    <a href="detail.php?id_article=${category[i][0]}">
                                        <h2 class="post-title">${category[i][1]}</h2>
                                        <h3 class="post-subtitle">${category[i][4]}</h3>
                                        <p><em>${category[i][2]} ${category[i][3]}</em></p>
                                        <p><em>${category[i][5]}</em></p>
                                    </a>
                                    <p class="post-meta">
                                        <a href="detail.php?id_article=${category[i][0]}">${category[i][6].substring(0, 150)}...</a>
                                    </p>
                                </div>
                                `)
    }
}

function displayAuthor(author) 
{
    $("#searchResult").empty();
    author = JSON.parse(author);
    for (let i = 0; i < author.length; i++) 
    {  
        console.log(author[i])
        $('#searchResult').append(`
                                <div class="post-preview">
                                    <a href="detail.php?id_article=${author[i][0]}">
                                        <h2 class="post-title">${author[i][1]}</h2>
                                        <h3 class="post-subtitle">${author[i][4]}</h3>
                                        <p><em>${author[i][2]} ${author[i][3]}</em></p>
                                        <p><em>${author[i][5]}</em></p>
                                    </a>
                                    <p class="post-meta">
                                        <a href="detail.php?id_article=${author[i][0]}">${author[i][6].substring(0, 150)}...</a>
                                    </p>
                                </div>
                                `)
    }   
}

document.addEventListener("DOMContentLoaded", function() {
    
    onAppelAjax()
    setInterval(onAppelAjax, 10000);
    
    $("#search").on("input", onAppelAjax2);
})