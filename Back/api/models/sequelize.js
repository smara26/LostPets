import Sequelize from 'sequelize';

const database = 'lost_pets';
const user = 'root';
const password = '';

const sequelize = new Sequelize(database, user, password, {
  host: 'localhost',
  dialect: 'mysql'
});

sequelize
  .authenticate()
  .then(() => console.log('Connected to database successfully'))
  .catch(() => console.error('Unable to connect to database'));

export default sequelize;
