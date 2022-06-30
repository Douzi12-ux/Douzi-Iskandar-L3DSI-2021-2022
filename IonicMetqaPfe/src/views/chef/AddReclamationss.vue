<template >

<ion-page>
  <ion-content :fullscreen="true">
    <ion-header :translucent="true">
      <ion-toolbar class="hh" color="primary">
        <ion-buttons slot="start">
          <ion-back-button defaultHref="/reclamationss"></ion-back-button>
        </ion-buttons>
        <ion-title> Ajouter Reclamation</ion-title>
      </ion-toolbar>
      <img class="rr" src="assets/logo.png" />
    </ion-header>


    <ion-content>
      <div class="content">
        <form @submit.prevent="addreclamation">
          <ion-list>
            <ion-list-header>Matriels </ion-list-header>
            <ion-item v-for="m in matriel" :key="m">
              <ion-label>{{ m.nom }}</ion-label>
              <ion-checkbox slot="end" @update:modelValue="m.isChecked = $event" :modelValue="m.isChecked">
              </ion-checkbox>
            </ion-item>
          </ion-list>
          <ion-list-header>Problemes </ion-list-header>
          <ion-list>
            <ion-item v-for="m in problems" :key="m">
              <ion-label>{{ m.nom }}</ion-label>
              <ion-checkbox slot="end" @update:modelValue="m.isChecked = $event" :modelValue="m.isChecked">
              </ion-checkbox>

            </ion-item>
          </ion-list>
          <ion-item>
            <ion-label>Details</ion-label>
            <ion-textarea v-model="details" rows="6" cols="20" placeholder="Enter any notes here..."></ion-textarea>
          </ion-item>
          <ion-list-header>autres </ion-list-header>
          <ion-list>
            <ion-item v-for="m in autre" :key="m">
              <ion-label>{{ m.nom }}</ion-label>
              <ion-checkbox slot="end" @update:modelValue="m.isChecked = $event" :modelValue="m.isChecked">
              </ion-checkbox>
            </ion-item>
          </ion-list>
          <ion-item>
            <ion-label>Autres details</ion-label>
            <ion-textarea v-model="adetails" rows="6" cols="20" placeholder="Enter any notes here..."></ion-textarea>
          </ion-item>


          <ion-row>
            <ion-col>
              <ion-button class="a" type="submit">Confirmer</ion-button>
            </ion-col>
            <ion-col>
              <ion-button color="danger" router-link="/reclamations">Annuler</ion-button>
            </ion-col>
          </ion-row>
        </form>
      </div>
    </ion-content>
  </ion-content>
</ion-page>
</template>

<script lang="ts">
import {
  IonContent, IonHeader, IonPage, IonTitle, IonToolbar, IonButton, IonLabel, IonBackButton,
  IonButtons, IonCol, IonRow, toastController, IonCheckbox, IonItem, IonList, IonListHeader, IonTextarea
} from '@ionic/vue';
import { defineComponent } from 'vue';
import { addIcons } from 'ionicons'
import { mail, key, person, shirt, home } from 'ionicons/icons';
addIcons(
  {
    "mail": mail, "key": key, "person": person, "shirt": shirt, "home": home
  }
)
import axios from 'axios';
export default defineComponent({
  data() {
    return {
dep:localStorage.getItem('departement'),
name:localStorage.getItem('name'),
email:localStorage.getItem('email'),
adetails:'',
details:'',
      autres: [],
      departements: [],
      users: [],
      matriel: [{ nom: 'Laptop', isChecked: false },
      { nom: 'Ordinateur', isChecked: false },
      { nom: 'Fix', isChecked: false },
      { nom: 'Imprimante', isChecked: false },
      { nom: 'Fax', isChecked: false },],
      problems: [{ nom: 'Formatage', isChecked: false },
      { nom: 'Licence', isChecked: false },
      { nom: 'Virus', isChecked: false },
      { nom: 'Reseaux', isChecked: false },
      { nom: 'Probleme technique', isChecked: false },],
      autre: [
        { nom: 'Souris', isChecked: false },
        { nom: 'Clavier', isChecked: false },
        { nom: 'Email', isChecked: false },
        { nom: 'Perte de donnes', isChecked: false },
        { nom: 'cable', isChecked: false },
        { nom: 'Disque', isChecked: false },
        { nom: 'Ecran', isChecked: false },],
   
    
      url: "http://192.168.125.159:8000",

    }

  }, methods: {
    addreclamation() {
      
      var resultm = this.matriel.filter(el => el.isChecked == true).map((d) => {
        return {
          'nom': d.nom,
        }
      })
      var rm=["=>"] as Array <any>
      resultm.forEach(element => {
        rm.push(element.nom)
      });
var resultp = this.problems.filter(el => el.isChecked == true).map((d) => {
        return {
          'nom': d.nom,
        }
      })
 var rp = ["=>"] as Array <any>
      resultp.forEach(element => {
        rp.push(element.nom)
      });
var resulta = this.autre.filter(el => el.isChecked == true).map((d) => {
        return {
          'nom': d.nom,
        }
      })
       var ra = ["=>"] as Array <any>
      resulta.forEach(element => {
        ra.push(element.nom)
      });
axios.post(this.url+'/api/reclamation',{
  iddepartement:this.dep,
  nom:this.name,
  email:this.email,
  matriel:rm,
  problems:rp,
  matrieldetails:this.details,
  Autres:ra,
  autresdetails:this.adetails,
})
    },


  },
  created() {

    axios.get(this.url + '/api/departement')
      .then(res => this.departements = res.data)
    axios.get(this.url + '/api/user')
      .then(res => this.users = res.data)

  }, setup() {



    return { mail, key };

  },

  name: 'AddReclamationss',
  components: {
    IonContent,
    IonHeader,
    IonPage,
    IonTitle,
    IonToolbar,
    IonButton,
    IonLabel,
    IonCheckbox,
    IonItem, IonList,
    IonBackButton,
    IonButtons, IonTextarea
    , IonCol, IonRow, IonListHeader
  }
});

</script>

<style scoped>
#container {
  text-align: center;

  position: absolute;
  left: 0;
  right: 0;
  top: 50%;
  transform: translateY(-50%);
}

#container strong {
  font-size: 20px;
  line-height: 26px;
}

#container p {
  font-size: 16px;
  line-height: 22px;

  color: #8c8c8c;

  margin: 0;
}

#container a {
  text-decoration: none;
}

template {
  color: aqua;
}

.a {
  margin-left: 20%;
  background-color: blue;
}

.hh {
  height: 70px;
  border-radius: 0px 0px 50px 30px;
}

.rr {
  width: 50%;
  margin-left: 20%;
}

.content {
  margin-top: 5%;
  height: 2000px;
}
</style>

