const getFlagValue = require('./getFlagValue')

let name = getFlagValue('--name')
let greeting = getFlagValue('--greeting')

console.log(`${greeting} ${name}`)