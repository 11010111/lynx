import path from 'path'
import esbuild from 'esbuild'
import * as glob from 'glob'
import * as fsExtra from 'fs-extra'
import { sassPlugin } from 'esbuild-sass-plugin'

const watch = process.argv.includes('--watch')
const outDir = 'Resources/Public'

let entryPoints = []

const paths = [
  {
    directory: path.join('Resources', 'Public', 'Scss'),
    out: path.join('Css'),
    ext: ['scss', 'sass'],
  },
  {
    directory: path.join('Resources', 'Public', 'JavaScript', 'Src'),
    out: path.join('JavaScript', 'Dist'),
    ext: ['js', 'ts'],
  },
]

paths.forEach(type => {
  const dir = `${type.directory}/**/*.{${type.ext.join(',')}}`

  glob.sync(dir).forEach(file => {
    if (path.parse(file).name.startsWith('_') || path.parse(file).base.includes('.d.ts')) {
      return
    }

    const fullOutPath = path.parse(file).dir.replace(type.directory, type.out)

    entryPoints.push({
      out: path.join(fullOutPath, path.parse(file).name),
      in: file
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
  sourcemap: true,
  plugins: [
    sassPlugin(),
    notificationPlugin,
  ]
}
const productionOptions = {
  drop: [
    'debugger',
    'console'
  ],
  treeShaking: true
}

if (watch) {
  const ctx = await esbuild.context(options)
  await ctx.watch()
  console.log('[esbuild]: Watching...')
} else {
  paths.forEach(type => {
    fsExtra.emptyDirSync(path.join(outDir, type.out))
  })

  await esbuild.build({
    ...options,
    ...productionOptions,
  })
  console.log('[esbuild]: Build complete')
}
