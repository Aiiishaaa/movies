$(document).ready(() => {
    $("#searchForm").on("input", (e) => {
        let searchText = $("#searchText").val();
        if (searchText == null) {
            console.log(true);
        }

        getMovies(searchText);
        e.preventDefault();
    });
});


function popularMovies() {
    axios
        .get(
            "https://api.themoviedb.org/3/movie/popular?api_key=2cd5601329a73db67d46ec6f68a6fcc9&language=fr-FR&page=1"
        )
        .then((response) => {
            console.log(response);

            let movies = response.data.results;
            let output = "";
            $.each(movies, (index, movie) => {
                if (movie.poster_path === null) {
                    poster = "../image/default-movie.png";
                } else {
                    poster =
                        "https://image.tmdb.org/t/p/w185_and_h278_bestv2" +
                        movie.poster_path;
                }

                let date = movie.release_date;
                let year = date.slice(0, 4);
                output += `
                    <div class=" movieBox col-md-3 col-lg-2">
                        <img src="${poster}" alt="poster" class="img">
                        <div class="browse-movie-bottom">
                            <a href="#" onclick="movieSelected('${movie.id}')" class="browse-movie-title">${movie.title}</a>
                            <div class="browse-movie-year">${year}</div>
                            <button type="submit" class="button" onclick="movieSelected('${movie.id}')">  Détails du film</button>
                        </div>
                    </div>
            `;
            });
            $("#movies").html(output);
        })
        .catch((error) => {
            console.log(error);
        });
}

function getMovies(searchText) {
    axios.get(
        "https://api.themoviedb.org/3/search/movie?api_key=2cd5601329a73db67d46ec6f68a6fcc9&query=" +
        searchText
    );
    axios
        .get("http://www.omdbapi.com/?apikey=a15bc27e&s=" + searchText)
        .then((response) => {
            console.log(response);
            let movies = response.data.results;
            let output = "";
            let output1 = "";
            $.each(movies, (index, movie) => {
                if (movie.poster_path === null) {
                    poster = "../image/default-movie.png";
                } else {
                    poster =
                        "https://image.tmdb.org/t/p/w185_and_h278_bestv2" +
                        movie.poster_path;
                }
                let date = movie.release_date;
                let year = date.slice(0, 4);
                output += `
                        <div class="movieBox col-md-3 col-lg-2">
                            <img src="${poster}" alt="poster" class="img">
                            <div class="browse-movie-bottom">
                                <a href="#" onclick="movieSelected('${movie.id}')" class="browse-movie-title">${movie.title}</a>
                                <div class="browse-movie-year">${year}</div>
                                <button type="submit" class="button" onclick="movieSelected1('${movie.id}')">Détails du film </button>
                            </div>
                        </div>
                `;
            });
            $("#movies").html(output);
        })
        .catch((error) => {
            console.log(error);
        });
}

function movieSelected(id) {
    sessionStorage.setItem("id", id);
    window.location = "movie.php";
    return false;
}

function getReviews() {
    let movieId = sessionStorage.getItem("id");
    axios
        .get(
            `https://api.themoviedb.org/3/movie/${movieId}/reviews?api_key=2cd5601329a73db67d46ec6f68a6fcc9&language=fr-FR&page=1`
        )

    .then((response) => {
            console.log(response);
            let reviews = response.data.results;
            console.log(reviews);
            let output = "";

            $.each(reviews, (index, review) => {
                output += `
                        <div class="review">
                                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                <div class="review-content">
                                <h5>Critiqué par ${review.author}</h5>
                                    <p>${review.content}</p>
                                </div>
                        </div>
                    </div>
                `;
            });
            $("#reviews").html(output);
        })
        .catch((error) => {
            console.log(error);
        });
}

function getMovie() {
    let movieId = sessionStorage.getItem("id");
    axios
        .get(
            `https://api.themoviedb.org/3/movie/${movieId}?api_key=2cd5601329a73db67d46ec6f68a6fcc9&language=fr-FR`
        )

    .then((response) => {
            console.log(response);
            let movie = response.data;

            if (movie.poster_path === null) {
                poster = "../image/default-movie.png";
            } else {
                poster =
                    "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movie.poster_path;
            }

            let date = movie.release_date;
            let year = date.slice(0, 4);
            let Rated;
            let revenue = movie.revenue / 1000000;
            let budget = movie.budget / 1000000;
            revenue = Math.round(revenue);
            budget = Math.round(budget);

            if (revenue === 0) {
                revenue = "Le revenu est inférieur à un million de dollars";
            }

            if (budget === 0) {
                budget = "Le budget est inférieur à un million de dollars";
            }

            let genre = [];
            movie.genres.forEach((element) => {
                genre.push(element.name);
            });

            genres = genre.join(" / ");

            let output1 = `
            <div class="row mt-5">
                <div class="col-lg-3 col-md-4">
                    <img src="${poster}" class="poster-image">
                </div>
                <div class="col-lg-3">
                    <h2 class="movie-title">${movie.title}</h2>
                    <ul class="list-group box-details">
                         <li class="list-group-item active">
                        <strong>Genres : </strong> ${genres} </li>
                        <li class="list-group-item active">
                            <strong>Note: </strong> ${movie.vote_average} / 10</li>
                        <li class="list-group-item active">
                            <strong> Durée : </strong> ${movie.runtime} min</li>
                        <li class="list-group-item active">
                            <strong>Budget : </strong> $ ${budget} million</li>
                        <li class="list-group-item active">
                            <strong>Revenue : </strong> $ ${revenue} million</li>
                        <li class="list-group-item active">
                            <strong>Langue : </strong> ${movie.original_language}</li>
                    </ul>
                </div>

                <div class="col-lg-4">
                    <h3 class="title-second">Résumé</h3>
                    <p>${movie.overview}</p>
                    <div >
                        <a href="http://imdb.com/title/${movie.imdb_id}" target="_blank" class="connexion">Voir sur IMDB</a>
                        <a href="browse.php" class="connexion">Voir le catalogue</a>
                    </div>
                </div>
            </div>
            `;
            $("#movie").html(output1);
        })
        .catch((error) => {
            console.log(error);
        });
}

//// for top rated movies
function getTopMovies() {
    axios
        .get(
            "https://api.themoviedb.org/3/movie/top_rated?api_key=2cd5601329a73db67d46ec6f68a6fcc9&language=fr-FR&page=1"
        )
        .then((response) => {
            console.log(response);

            let movies = response.data.results;
            console.log(movies);

            let output = "";

            for (let index = 0; index < 4; index++) {
                if (movies[index].poster_path === null) {
                    poster = "../image/default-movie.png";
                } else {
                    poster =
                        "https://image.tmdb.org/t/p/w185_and_h278_bestv2" +
                        movies[index].poster_path;
                }

                let date = movies[index].release_date;

                let year = date.slice(0, 4);
                output += `
                        <div class="col-md-3 box">
                          <div class="movieBox">
                            <img src="${poster}" alt="poster" width="220" height="300" class="img">
                            <div class="browse-movie-bottom">
                                <a href="#" onclick="movieSelected('${movies[index].id}')" class="browse-movie-title">${movies[index].title}</a>
                                <div class="browse-movie-year">${year}</div>
                                <button type="submit" class="button" onclick="movieSelected('${movies[index].id}')">Détails du film</button>
                            </div>
                            </div>
                        </div>
                `;
            }
            $("#topMovies1").html(output);

            let output1 = "";
            for (let index = 4; index < 8; index++) {
                if (movies[index].poster_path === null) {
                    poster = "../image/default-movie.png";
                } else {
                    poster =
                        "https://image.tmdb.org/t/p/w185_and_h278_bestv2" +
                        movies[index].poster_path;
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
                                <button type="submit" class="button" onclick="movieSelected('${movies[index].id}')">  Détails du film</button>
                            </div>
                            </div>
                        </div>
                `;
            }
            $("#topMovies2").html(output1);

            let output2 = "";
            for (let index = 8; index < 12; index++) {
                if (movies[index].poster_path === null) {
                    poster = "../image/default-movie.png";
                } else {
                    poster =
                        "https://image.tmdb.org/t/p/w185_and_h278_bestv2" +
                        movies[index].poster_path;
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
                                <button type="submit" class="button" onclick="movieSelected('${movies[index].id}')">  Détails du film</button>
                            </div>
                            </div>
                        </div>
                `;
            }
            $("#topMovies3").html(output2);

            let output3 = "";
            for (let index = 12; index < 16; index++) {
                if (movies[index].poster_path === null) {
                    poster = "../image/default-movie.png";
                } else {
                    poster =
                        "https://image.tmdb.org/t/p/w185_and_h278_bestv2" +
                        movies[index].poster_path;
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
                                <button type="submit" class="button" onclick="movieSelected('${movies[index].id}')"> Détails du film</button>
                            </div>
                            </div>
                        </div>
                `;
            }
            $("#topMovies4").html(output3);

            let output4 = "";
            for (let index = 16; index < 20; index++) {
                if (movies[index].poster_path === null) {
                    poster = "../image/default-movie.png";
                } else {
                    poster =
                        "https://image.tmdb.org/t/p/w185_and_h278_bestv2" +
                        movies[index].poster_path;
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
                                <button type="submit" class="button" onclick="movieSelected('${movies[index].id}')">  Détails du film</button>
                            </div>
                            </div>
                        </div>
                `;
            }
            $("#topMovies5").html(output4);
        })
        .catch((error) => {
            console.log(error);
        });

}