import path from 'path'
import fs from 'fs'
import esbuild from 'esbuild'
import sassPlugin from 'esbuild-plugin-sass'

const watch = process.argv.includes('--watch')
const outDir = 'Resources/Public'

let entryPoints = []

const paths = [
  {
    directory: path.join('Resources', 'Public', 'Scss'),
    out: path.join('Css'),
    ext: ['.scss'],
  },
  {
    directory: path.join('Resources', 'Public', 'JavaScript', 'Src'),
    out: path.join('JavaScript', 'Dist'),
    ext: ['.js', '.ts'],
  },
]

paths.forEach(type => {
  fs.readdirSync(type.directory).forEach(file => {
    if (file.startsWith('_')) {
      return
    }

    type.ext.forEach(ext => {
      if (file.endsWith(ext)) {
        entryPoints.push({
          out: path.join(type.out, path.parse(file).name),
          in: `${type.directory}/${file}`
        })
      }
    })
  })
})

const notificationPlugin = {
  name: 'notification-plugin',
  setup(build) {
    build.onStart(() => {
      console.log('\x1b[0;92m[esbuild] Compiling...\x1b[0m')
      console.time('\x1b[0;92m[esbuild] Done in')
    })
    build.onEnd(() => {
      console.timeEnd('\x1b[0;92m[esbuild] Done in')
      console.log('\x1b[0m')
    })
  },
}

const options = {
  entryPoints,
  outdir: outDir,
  bundle: false,
  minify: !watch,
  sourcemap: 'external',
  plugins: [
    sassPlugin(),
    notificationPlugin,
  ]
}

if (watch) {
  const ctx = await esbuild.context(options)
  await ctx.watch()
} else {
  await esbuild.build(options)
  console.log('Build successful')
}
