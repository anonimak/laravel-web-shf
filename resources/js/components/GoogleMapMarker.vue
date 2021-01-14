<script>
import { POINT_MARKER_ICON_CONFIG } from "@/constants/mapSettings";

export default {
  props: {
    google: {
      type: Object,
      required: true
    },
    map: {
      type: Object,
      required: true
    },
    marker: {
      type: Object,
      required: true
    }
  },

  mounted() {
    const { Marker, InfoWindow } = this.google.maps;

    const contentString =
          `<div id="content">
          <div id="siteNotice">
          </div>
          <h5 id="firstHeading" class="firstHeading">${this.marker.name}</h5>
          <div id="bodyContent">
            <table style="width:100%">
              <tr>
                <th style="width:20%; vertical-align: top;text-align: left;">Address</th>
                <th style="vertical-align: top;text-align: left;">:</th>
                <td>${this.marker.address}</td>
              </tr>
              <tr>
                <th style="width:20%; vertical-align: top;text-align: left;">Telp</th>
                <th style="vertical-align: top;text-align: left;">:</th>
                <td>${this.marker.telp}</td>
              </tr>
            </table>
          </div>
          </div>`;
    
    const infowindow = new InfoWindow({
          content: contentString,
    });
    
    const marker = new Marker({
      position: this.marker.position,
      marker: this.marker,
      map: this.map,
      icon: POINT_MARKER_ICON_CONFIG
    });

    marker
      .addListener("click", () => {
            infowindow.open(this.map, marker)
      });
    // marker
      // .addListener("mouseout", () => {
      //   setInterval(() => {
      //     infowindow.close()
      //   }, 3000)
      // });
  },

  render() {}
};
</script>
