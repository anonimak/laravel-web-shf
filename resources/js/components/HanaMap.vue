<template>
  <GoogleMapLoader
    :mapConfig="mapConfig"
    apiKey="AIzaSyCRBUHbaB-2oIAEoLd3aNmab6kuq53cLms"
  >
  // insert your google maps api key to render styled map
    <template slot-scope="{ google, map }">
      <GoogleMapMarker
        v-for="marker in markers"
        :key="marker.id"
        :marker="marker"
        :google="google"
        :map="map"
      />
    </template>
  </GoogleMapLoader>
</template>

<script>
import GoogleMapLoader from "@/components/GoogleMapLoader";
import GoogleMapMarker from "@/components/GoogleMapMarker";

import { mapSettings } from "@/constants/mapSettings";

export default {
  components: {
    GoogleMapLoader,
    GoogleMapMarker
  },

  props: ["datamarkers"],

  data() {
    return {
      // markers: [
      //   {
      //     id: "a",
      //     position: { lat: -6.363812478195629, lng: 106.83347493976629 }
      //   },
      //   {
      //     id: "b",
      //     position: { lat: 5, lng: 99 }
      //   },
      //   {
      //     id: "c",
      //     position: { lat: 6, lng: 97 }
      //   }
      // ]

      markers: this.datamarkers.map(function(marker){
        return {
            id : marker.id,
            name : marker.name,
            address : marker.address,
            telp : marker.telp,
            position : {lat: parseFloat(marker.latitude), lng: parseFloat(marker.longitude)}
        }
      }),
    };
  },

  computed: {
    mapConfig() {
      return {
        ...mapSettings,
        center: this.mapCenter
      };
    },

    mapCenter() {
      return this.markers[0].position;
    }
  }
};
</script>
