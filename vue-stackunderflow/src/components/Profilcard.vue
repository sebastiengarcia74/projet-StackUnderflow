<template>
  <li class="profile-card">
        <a href="#">
        <img src="./icons/sachapokemon.jpg" alt="profile" class="profile-img"></a>
        <ul class="side-social">
          <!-- <a href="#">
            <img src="./icons/heart.svg" alt="heart" class="heart">
          </a> -->
          
        </ul>
        <div class="profile-info">
          <p class="profile-name">Sacha</p>
          <p class="profile-work">Aime collectionner les pokemons</p>
        </div>
      </li>
</template>

<script>
export default {

}
</script>

<style scoped>
.profile-card {
  position: relative;
  overflow: hidden;
  cursor: pointer;
  height: 250px;
  width: 400px;
  border-radius: 10%;
  border: 1px solid #b7b7b75a;
  transition: transform 0.4s ease-out;
}
.profile-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.side-social {
  position: absolute;
  top: 0;
  height: 100%;
  list-style-type: none;
}
.side-social a {
  width: 35px;
  height: 35px;
  border-radius: 50%;
  margin: 5px;
  border: 1px solid #999;
  background-color: #cccc;
  display: flex;
  justify-content: center;
  align-items: center;
  transform: translateX(calc(-100%  - 10px));
  transition: transform 0.2s ease-in-out;
}
.side-social a:hover {
  background-color: #333;
}
.side-social a img {
  width: 80%;
}

.profile-info {
  position: absolute;
  bottom: 0;
  width: 100%;
  padding: 10px;
  background-color: #50964E;
  border-top: 1px solid #9999997b;
  text-align: center;
  transform: translateY(100%);
  transition: transform 0.3s ease-in-out;
}
.profile-name {
  font-size: 20px;
  font-weight: 600;
  margin-bottom: 5px;
  color: #e8d295;
}
.profile-work {
  font-size: 16px;
  font-weight: 500;
  font-style: italic;
  color: #fdfdfd;
  font-family: Raleway, sans-serif;
}
.profile-name,
.profile-work {
  will-change: transform;
}
.profile-card:hover .profile-info,
.profile-card:hover .side-social a {
  transform: translate(0);
}

.profile-card:hover .side-social a:nth-child(1) {
  transition-delay: 0.1s;
}


.profile-card:hover {
  transform: scale(0.95);
  box-shadow: 0 0 0 3px #f1f1f1;
}

@media (pointer: coarse) {

  .profile-info,
  .side-social a {
    transform: translate(0);
  }

  .profile-card:hover {
    transform: none;
    box-shadow: none;
  }
}
@media(max-width: 500px) {
                .profile-card {
                    position: fixed;
                    top: 120px;
                    right: 10px;
                   width: 60%;
                   height: 40%;
                   border: 3px solid #B49264;
                  }
                  
                  
                  .profile-img {
  width: 100%;
  height: 100%;
  object-fit: contain;
}
.profile-info {
    width: 96%;
    height: 30%;
}
                }                
</style>