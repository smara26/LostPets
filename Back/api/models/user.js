import Sequelize from 'sequelize';

const User = sequelize => {
  user = sequelize.define('user', {
    id: {
      type: Sequelize.INTEGER(10),
      primaryKey: true,
      autoIncrement: true
    },
    email: {
      type: Sequelize.STRING(30),
      unique: true
    },
    password: Sequelize.STRING(30),
    firstName: Sequelize.STRING(30),
    lastName: Sequelize.STRING(30),
    gender: {
      type: Sequelize.STRING(15),
      allowNull: true
    },
    age: {
      type: Sequelize.INTEGER(4),
      allowNull: true
    },
    location: {
      type: Sequelize.STRING(40),
      allowNull: true
    }
  });

  sequelize.sync();
  return user;
};

export default User;
