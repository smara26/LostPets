import userRoutes from './user.routes';
import adRoutes from './ad.routes';

const routes = [];
const pushToRoutes = sourceRoutes => {
  sourceRoutes.forEach(route => routes.push(route));
};

pushToRoutes(userRoutes);
pushToRoutes(adRoutes);

export default routes;
