module.exports = function getFlagValue(flag) {
    const argv = process.argv;
    if (flag) {
        const indexOfValue = (argv.indexOf(flag)) + 1;
        return argv[indexOfValue];
    }
}