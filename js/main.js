$(document).ready(() => {
    $('#searchForm').on('input', (e) => {

        let searchText = $('#searchText').val();

        if (searchText == null) {
            console.log(true);
        }

        getMovies(searchText);
        e.preventDefault();
    })
})



// var btn = document.getElementById('searchBtn');
// var search = document.getElementById('searchBox')
// btn.addEventListener('submit', (event) => {
//     e.preventDefault()
//     getMovies(search.value);
// })
function popularMovies() {
    axios.get('https://api.themoviedb.org/3/movie/popular?api_key=5ec279387e9aa9488ef4d00b22acc451&language=en-US&page=1')
        .then((response) => {
            console.log(response);

            let movies = response.data.results;
            let output = '';
            $.each(movies, (index, movie) => {

                if (movie.poster_path === null) {
                    poster = "../image/default-movie.png";
                } else {
                    poster = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movie.poster_path;
                }

                let date = movie.release_date;

                let year = date.slice(0, 4);
                output += `
                    <div class="col-md-3 box">
                      <div class="movieBox">
                        <img src="${poster}" alt="poster" width="210" height="315" class="img">
                        <div class="browse-movie-bottom">
                            <a href="#" onclick="movieSelected('${movie.id}')" class="browse-movie-title">${movie.title}</a>
                            <div class="browse-movie-year">${year}</div>
                            <button type="submit" class="button" onclick="movieSelected('${movie.id}')">Movie Details</button>
                        </div>
                        </div>
                    </div>
            `
            });
            $('#movies').html(output);
        })
        .catch((error) => {
            console.log(error);
        });
}


function getMovies(searchText) {

    axios.get('https://api.themoviedb.org/3/search/movie?api_key=5ec279387e9aa9488ef4d00b22acc451&query=' + searchText)
        //  axios.get('http://www.omdbapi.com/?apikey=a15bc27e&s=' + searchText)
        .then((response) => {
            console.log(response);

            let movies = response.data.results;
            let output = '';
            let output1 = '';
            $.each(movies, (index, movie) => {

                if (movie.poster_path === null) {
                    poster = "../image/default-movie.png";
                } else {
                    poster = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movie.poster_path;
                }

                let date = movie.release_date;

                let year = date.slice(0, 4);
                output += `
                        <div class="col-md-3 box">
                          <div class="movieBox">
                            <img src="${poster}" alt="poster" width="210" height="315" class="img">
                            <div class="browse-movie-bottom">
                                <a href="#" onclick="movieSelected('${movie.id}')" class="browse-movie-title">${movie.title}</a>
                                <div class="browse-movie-year">${year}</div>
                                <button type="submit" class="button" onclick="movieSelected1('${movie.id}')">Movie Details</button>
                            </div>
                            </div>
                        </div>
                `
            });
            $('#movies').html(output);
        })
        .catch((error) => {
            console.log(error);
        });
}

function movieSelected(id) {
    sessionStorage.setItem('id', id);
    window.location = 'movie.php';
    return false;
}

// function movieSelected2(id) {
//     sessionStorage.setItem('id', id);
//     window.location = 'guest/movie.php';
//     return false;
// }

function getReviews() {

    let movieId = sessionStorage.getItem('id');
    axios.get(`https://api.themoviedb.org/3/movie/${movieId}/reviews?api_key=5ec279387e9aa9488ef4d00b22acc451&language=en-US&page=1`)

        .then((response) => {
            // https://api.themoviedb.org/3/movie/299536/reviews?api_key=5ec279387e9aa9488ef4d00b22acc451&language=en-US&page=1
            console.log(response);
            let reviews = response.data.results;
            console.log(reviews);
            let output = '';

            $.each(reviews, (index, review) => {

                output += `
                        <div class="row review">
                            <div class="col-md-2 box-review1">
                                <img src="../image/default-user.png" alt="user" class="user-profile">
                            </div>
                            <div class="col-md-10 box-review2">
                                <h5>Reviewed by ${review.author}</h5>
                                <div class="content">
                                    <p style="color:silver;">${review.content}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                `
            });
            $('#reviews').html(output);
        })
        .catch((error) => {
            console.log(error);
        });
}

function getMovie() {
    let movieId = sessionStorage.getItem('id');

    //test id -> 299536
    axios.get(`https://api.themoviedb.org/3/movie/${movieId}?api_key=5ec279387e9aa9488ef4d00b22acc451`)
        .then((response) => {
            // https://api.themoviedb.org/3/movie/299536/reviews?api_key=5ec279387e9aa9488ef4d00b22acc451&language=en-US&page=1
            console.log(response);
            let movie = response.data;

            if (movie.poster_path === null) {
                poster = "../image/default-movie.png";
            } else {
                poster = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movie.poster_path;
            }

            let date = movie.release_date;

            let year = date.slice(0, 4);
            let Rated;

            let revenue = movie.revenue / 1000000;
            let budget = movie.budget / 1000000;
            revenue = Math.round(revenue);
            budget = Math.round(budget);

            if (revenue === 0) {
                revenue = "Revenue is less than million dollers"
            }

            if (budget === 0) {
                budget = "Budget is less than million dollers"
            }

            let genre = [];
            movie.genres.forEach(element => {
                genre.push(element.name);
            });

            genres = genre.join(' / ');

            let output1 = `
            <div class="row">
                <div class="col-md-4 box1">
                    <img src="${poster}" class="poster-image">
                </div>
                <div class="col-md-4 box2">
                    <h1 class="movie-title">${movie.title}</h1>

                    <h5 style="color: white; font-weight:bold">${year}</h5>
                    <h5 style="color: white; font-weight:bold; margin-top: -10px;">${genres}</h5>

                    <ul class="list-group">
                        <li class="list-group-item active">
                            <strong>Rating: </strong> ${movie.vote_average} / 10</li>
                        <li class="list-group-item active">
                            <strong>Status: </strong> ${movie.status}</li>
                        <li class="list-group-item active">
                            <strong>Duration: </strong> ${movie.runtime} min</li>
                        <li class="list-group-item active">
                            <strong>Budget: </strong> $ ${budget} million</li>
                        <li class="list-group-item active">
                            <strong>Revenue: </strong> $ ${revenue} million</li>
                    </ul>

                </div>

                <div class="col-md-4 box3">
                    <h1 class="title-second">Synopsis</h1>
                    <p>${movie.overview}</p>
                    <hr style="width: 80%;color: #222;">
                    <div>
                        <a href="http://imdb.com/title/${movie.imdb_id}" target="_blank" class="btn-one">View IMDB</a>
                        <!-- <a href="http://imdb.com/title/${movie.imdb_id}" target="_blank" class="btn-info">View IMDB</a> -->
                        <a href="browse.php" class="btn-second">Go Back To Search</a>
                    </div>
                </div>
            </div>
            `
            $('#movie').html(output1);
        })
        .catch((error) => {
            console.log(error);
        });
}

//// for top rated movies
function getTopMovies() {
    axios.get('https://api.themoviedb.org/3/movie/top_rated?api_key=5ec279387e9aa9488ef4d00b22acc451&language=en-US&page=1')
        .then((response) => {
            console.log(response);

            let movies = response.data.results;
            // console.log(movies);

            let output = '';

            for (let index = 0; index < 4; index++) {
                if (movies[index].poster_path === null) {
                    poster = "../image/default-movie.png";
                } else {
                    poster = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movies[index].poster_path;
                }

                let date = movies[index].release_date;

                let year = date.slice(0, 4);
                output += `
                        <div class="col-md-3 box">
                          <div class="movieBox">
                            <img src="${poster}" alt="poster" width="210" height="315" class="img">
                            <div class="browse-movie-bottom">
                                <a href="#" onclick="movieSelected('${movies[index].id}')" class="browse-movie-title">${movies[index].title}</a>
                                <div class="browse-movie-year">${year}</div>
                                <button type="submit" class="button" onclick="movieSelected('${movies[index].id}')">Movie Details</button>
                            </div>
                            </div>
                        </div>
                `;
            }
            $('#topMovies1').html(output);


            let output1 = '';
            for (let index = 4; index < 8; index++) {
                if (movies[index].poster_path === null) {
                    poster = "../image/default-movie.png";
                } else {
                    poster = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movies[index].poster_path;
                }

                let date = movies[index].release_date;

                let year = date.slice(0, 4);
                output1 += `
                        <div class="col-md-3 box">
                          <div class="movieBox">
                            <img src="${poster}" alt="poster" width="210" height="315" class="img">
                            <div class="browse-movie-bottom">
                                <a href="#" onclick="movieSelected('${movies[index].id}')" class="browse-movie-title">${movies[index].title}</a>
                                <div class="browse-movie-year">${year}</div>
                                <button type="submit" class="button" onclick="movieSelected('${movies[index].id}')">Movie Details</button>
                            </div>
                            </div>
                        </div>
                `;
            }
            $('#topMovies2').html(output1);


            let output2 = '';
            for (let index = 8; index < 12; index++) {
                if (movies[index].poster_path === null) {
                    poster = "../image/default-movie.png";
                } else {
                    poster = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movies[index].poster_path;
                }

                let date = movies[index].release_date;

                let year = date.slice(0, 4);
                output2 += `
                        <div class="col-md-3 box">
                          <div class="movieBox">
                            <img src="${poster}" alt="poster" width="210" height="315" class="img">
                            <div class="browse-movie-bottom">
                                <a href="#" onclick="movieSelected('${movies[index].id}')" class="browse-movie-title">${movies[index].title}</a>
                                <div class="browse-movie-year">${year}</div>
                                <button type="submit" class="button" onclick="movieSelected('${movies[index].id}')">Movie Details</button>
                            </div>
                            </div>
                        </div>
                `;
            }
            $('#topMovies3').html(output2);



            let output3 = '';
            for (let index = 12; index < 16; index++) {
                if (movies[index].poster_path === null) {
                    poster = "../image/default-movie.png";
                } else {
                    poster = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movies[index].poster_path;
                }

                let date = movies[index].release_date;

                let year = date.slice(0, 4);
                output3 += `
                        <div class="col-md-3 box">
                          <div class="movieBox">
                            <img src="${poster}" alt="poster" width="210" height="315" class="img">
                            <div class="browse-movie-bottom">
                                <a href="#" onclick="movieSelected('${movies[index].id}')" class="browse-movie-title">${movies[index].title}</a>
                                <div class="browse-movie-year">${year}</div>
                                <button type="submit" class="button" onclick="movieSelected('${movies[index].id}')">Movie Details</button>
                            </div>
                            </div>
                        </div>
                `;
            }
            $('#topMovies4').html(output3);




            let output4 = '';
            for (let index = 16; index < 20; index++) {
                if (movies[index].poster_path === null) {
                    poster = "../image/default-movie.png";
                } else {
                    poster = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movies[index].poster_path;
                }

                let date = movies[index].release_date;

                let year = date.slice(0, 4);
                output4 += `
                        <div class="col-md-3 box">
                          <div class="movieBox">
                            <img src="${poster}" alt="poster" width="210" height="315" class="img">
                            <div class="browse-movie-bottom">
                                <a href="#" onclick="movieSelected('${movies[index].id}')" class="browse-movie-title">${movies[index].title}</a>
                                <div class="browse-movie-year">${year}</div>
                                <button type="submit" class="button" onclick="movieSelected('${movies[index].id}')">Movie Details</button>
                            </div>
                            </div>
                        </div>
                `;
            }
            $('#topMovies5').html(output4);
            // $.each(movies, (index, movie) => {

            //     if (movie.poster_path === null) {
            //         poster = "image/default-movie.png";
            //     } else {
            //         poster = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movie.poster_path;
            //     }

            //     let date = movie.release_date;

            //     let year = date.slice(0, 4);
            //     output += `
            //             <div class="col-md-3 box">
            //               <div class="movieBox">
            //                 <img src="${poster}" alt="poster" width="210" height="315" class="img">
            //                 <div class="browse-movie-bottom">
            //                     <a href="#" onclick="movieSelected('${movie.id}')" class="browse-movie-title">${movie.title}</a>
            //                     <div class="browse-movie-year">${year}</div>
            //                     <button type="submit" class="button" onclick="movieSelected('${movie.id}')">Movie Details</button>
            //                 </div>
            //                 </div>
            //             </div>
            //     `;
            //     if (index < 4) {
            //         $('#topMovies1').html(output);
            //     }
            //     else if (index < 8) {
            //         $('#topMovies2').html(output);
            //     }
            //     else if (index < 12) {
            //         $('#topMovies3').html(output);
            //     }
            //     else if (index < 16) {
            //         $('#topMovies4').html(output);
            //     }
            //     else if (index < 19) {
            //         $('#topMovies5').html(output);
            //     }

            // });


            // $('#topMovies').html(output);
        })
        .catch((error) => {
            console.log(error);
        });
}





