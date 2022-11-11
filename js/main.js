function popularMovies(){axios.get("https://api.themoviedb.org/3/movie/popular?api_key=2cd5601329a73db67d46ec6f68a6fcc9&language=fr-FR&page=1").then(e=>{console.log(e);let t=e.data.results,i="";$.each(t,(e,t)=>{poster=null===t.poster_path?"../image/default-movie.png":"https://image.tmdb.org/t/p/w185_and_h278_bestv2"+t.poster_path;i+=`
                    <div class=" movieBox col-md-3 col-lg-2">
                        <img src="${poster}" alt="poster" class="img">
                        <div class="browse-movie-bottom">
                            <a href="#" onclick="movieSelected('${t.id}')" class="browse-movie-title">${t.title}</a>
                            <div class="browse-movie-year">${t.release_date.slice(0,4)}</div>
                            <button type="submit" class="button" onclick="movieSelected('${t.id}')">  D\xe9tails du film</button>
                        </div>
                    </div>
            `}),$("#movies").html(i)}).catch(e=>{console.log(e)})}function getMovies(e){axios.get("https://api.themoviedb.org/3/search/movie?api_key=2cd5601329a73db67d46ec6f68a6fcc9&query="+e),axios.get("http://www.omdbapi.com/?apikey=a15bc27e&s="+e).then(e=>{console.log(e);let t=e.data.results,i="";$.each(t,(e,t)=>{poster=null===t.poster_path?"../image/default-movie.png":"https://image.tmdb.org/t/p/w185_and_h278_bestv2"+t.poster_path;i+=`
                        <div class="movieBox col-md-3 col-lg-2">
                            <img src="${poster}" alt="poster" class="img">
                            <div class="browse-movie-bottom">
                                <a href="#" onclick="movieSelected('${t.id}')" class="browse-movie-title">${t.title}</a>
                                <div class="browse-movie-year">${t.release_date.slice(0,4)}</div>
                                <button type="submit" class="button" onclick="movieSelected1('${t.id}')">D\xe9tails du film </button>
                            </div>
                        </div>
                `}),$("#movies").html(i)}).catch(e=>{console.log(e)})}function movieSelected(e){return sessionStorage.setItem("id",e),window.location="movie.php",!1}function getReviews(){let e=sessionStorage.getItem("id");axios.get(`https://api.themoviedb.org/3/movie/${e}/reviews?api_key=2cd5601329a73db67d46ec6f68a6fcc9&language=fr-FR&page=1`).then(e=>{console.log(e);let t=e.data.results;console.log(t);let i="";$.each(t,(e,t)=>{i+=`
                        <div class="review">
                                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                <div class="review-content">
                                <h5>Critiqu\xe9 par ${t.author}</h5>
                                    <p>${t.content}</p>
                                </div>
                        </div>
                    </div>
                `}),$("#reviews").html(i)}).catch(e=>{console.log(e)})}function getMovie(){let e=sessionStorage.getItem("id");axios.get(`https://api.themoviedb.org/3/movie/${e}?api_key=2cd5601329a73db67d46ec6f68a6fcc9&language=fr-FR`).then(e=>{console.log(e);let t=e.data;poster=null===t.poster_path?"../image/default-movie.png":"https://image.tmdb.org/t/p/w185_and_h278_bestv2"+t.poster_path;t.release_date.slice(0,4);let i=t.revenue/1e6,o=t.budget/1e6;i=Math.round(i),o=Math.round(o),0===i&&(i="Le revenu est inf\xe9rieur \xe0 un million de dollars"),0===o&&(o="Le budget est inf\xe9rieur \xe0 un million de dollars");let s=[];t.genres.forEach(e=>{s.push(e.name)});let l=`
            <div class="row mt-5">
                <div class="col-lg-3 col-md-4">
                    <img src="${poster}" class="poster-image">
                </div>
                <div class="col-lg-3">
                    <h2 class="movie-title">${t.title}</h2>
                    <ul class="list-group box-details">
                         <li class="list-group-item active">
                        <strong>Genres : </strong> ${genres=s.join(" / ")} </li>
                        <li class="list-group-item active">
                            <strong>Note: </strong> ${t.vote_average} / 10</li>
                        <li class="list-group-item active">
                            <strong> Dur\xe9e : </strong> ${t.runtime} min</li>
                        <li class="list-group-item active">
                            <strong>Budget : </strong> $ ${o} million</li>
                        <li class="list-group-item active">
                            <strong>Revenue : </strong> $ ${i} million</li>
                        <li class="list-group-item active">
                            <strong>Langue : </strong> ${t.original_language}</li>
                    </ul>
                </div>

                <div class="col-lg-4">
                    <h3 class="title-second">R\xe9sum\xe9</h3>
                    <p>${t.overview}</p>
                    <div >
                        <a href="http://imdb.com/title/${t.imdb_id}" target="_blank" class="connexion">Voir sur IMDB</a>
                        <a href="browse.php" class="connexion">Voir le catalogue</a>
                    </div>
                </div>
            </div>
            `;$("#movie").html(l)}).catch(e=>{console.log(e)})}function getTopMovies(){axios.get("https://api.themoviedb.org/3/movie/top_rated?api_key=2cd5601329a73db67d46ec6f68a6fcc9&language=fr-FR&page=1").then(e=>{console.log(e);let t=e.data.results;console.log(t);let i="";for(let o=0;o<4;o++){poster=null===t[o].poster_path?"../image/default-movie.png":"https://image.tmdb.org/t/p/w185_and_h278_bestv2"+t[o].poster_path;i+=`
                        <div class="col-md-3 box">
                          <div class="movieBox">
                            <img src="${poster}" alt="poster" width="220" height="300" class="img">
                            <div class="browse-movie-bottom">
                                <a href="#" onclick="movieSelected('${t[o].id}')" class="browse-movie-title">${t[o].title}</a>
                                <div class="browse-movie-year">${t[o].release_date.slice(0,4)}</div>
                                <button type="submit" class="button" onclick="movieSelected('${t[o].id}')">D\xe9tails du film</button>
                            </div>
                            </div>
                        </div>
                `}$("#topMovies1").html(i);let s="";for(let l=4;l<8;l++){poster=null===t[l].poster_path?"../image/default-movie.png":"https://image.tmdb.org/t/p/w185_and_h278_bestv2"+t[l].poster_path;s+=`
                        <div class="col-md-3 box">
                          <div class="movieBox">
                            <img src="${poster}" alt="poster" width="210" height="315" class="img">
                            <div class="browse-movie-bottom">
                                <a href="#" onclick="movieSelected('${t[l].id}')" class="browse-movie-title">${t[l].title}</a>
                                <div class="browse-movie-year">${t[l].release_date.slice(0,4)}</div>
                                <button type="submit" class="button" onclick="movieSelected('${t[l].id}')">  D\xe9tails du film</button>
                            </div>
                            </div>
                        </div>
                `}$("#topMovies2").html(s);let a="";for(let c=8;c<12;c++){poster=null===t[c].poster_path?"../image/default-movie.png":"https://image.tmdb.org/t/p/w185_and_h278_bestv2"+t[c].poster_path;a+=`
                        <div class="col-md-3 box">
                          <div class="movieBox">
                            <img src="${poster}" alt="poster" width="210" height="315" class="img">
                            <div class="browse-movie-bottom">
                                <a href="#" onclick="movieSelected('${t[c].id}')" class="browse-movie-title">${t[c].title}</a>
                                <div class="browse-movie-year">${t[c].release_date.slice(0,4)}</div>
                                <button type="submit" class="button" onclick="movieSelected('${t[c].id}')">  D\xe9tails du film</button>
                            </div>
                            </div>
                        </div>
                `}$("#topMovies3").html(a);let d="";for(let v=12;v<16;v++){poster=null===t[v].poster_path?"../image/default-movie.png":"https://image.tmdb.org/t/p/w185_and_h278_bestv2"+t[v].poster_path;d+=`
                        <div class="col-md-3 box">
                          <div class="movieBox">
                            <img src="${poster}" alt="poster" width="210" height="315" class="img">
                            <div class="browse-movie-bottom">
                                <a href="#" onclick="movieSelected('${t[v].id}')" class="browse-movie-title">${t[v].title}</a>
                                <div class="browse-movie-year">${t[v].release_date.slice(0,4)}</div>
                                <button type="submit" class="button" onclick="movieSelected('${t[v].id}')"> D\xe9tails du film</button>
                            </div>
                            </div>
                        </div>
                `}$("#topMovies4").html(d);let r="";for(let m=16;m<20;m++){poster=null===t[m].poster_path?"../image/default-movie.png":"https://image.tmdb.org/t/p/w185_and_h278_bestv2"+t[m].poster_path;r+=`
                        <div class="col-md-3 box">
                          <div class="movieBox">
                            <img src="${poster}" alt="poster" width="210" height="315" class="img">
                            <div class="browse-movie-bottom">
                                <a href="#" onclick="movieSelected('${t[m].id}')" class="browse-movie-title">${t[m].title}</a>
                                <div class="browse-movie-year">${t[m].release_date.slice(0,4)}</div>
                                <button type="submit" class="button" onclick="movieSelected('${t[m].id}')">  D\xe9tails du film</button>
                            </div>
                            </div>
                        </div>
                `}$("#topMovies5").html(r)}).catch(e=>{console.log(e)})}$(document).ready(()=>{$("#searchForm").on("input",e=>{let t=$("#searchText").val();null==t&&console.log(!0),getMovies(t),e.preventDefault()})});