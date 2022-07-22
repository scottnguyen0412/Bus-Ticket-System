import React from "react";
import { Switch, Route } from "react-router-dom";
import Navbar from "./Navbar";
import HomeRoute from "../../routes/HomeRoute";
import Footer from "./Footer";
import Slider from "./Slider";

function Home() {
  return (
    <div>
      <Navbar />
      <Slider />
      <Switch>
        {HomeRoute.map((routedata, index) => {
          return (
            routedata.component && (
              <Route
                key={index}
                path={routedata.path}
                exact={routedata.exact}
                name={routedata.name}
                render={(props) => <routedata.component {...props} />}
              />
            )
          );
        })}
      </Switch>
      <Footer />
    </div>
  );
}

export default Home;
