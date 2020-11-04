import React from "react";
import { Switch, Route } from "react-router-dom";
import Editor from "./pages/Editor";
import EditorEdit from "./pages/Editor/Edit";

const Routes = () => {
  const route = process.env.MIX_APP_ROUTE;
  return (
    <Switch>
      <Route path={`${route}/editor/:id/edit`} component={EditorEdit} />
      <Route path={`${route}/editor`} component={Editor} />
    </Switch>
  );
};
export default Routes;
