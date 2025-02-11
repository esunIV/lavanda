package com.example.tetrisgame

import android.content.Context
import android.graphics.Canvas
import android.view.SurfaceHolder
import android.view.SurfaceView

class TetrisView(context: Context) : SurfaceView(context), SurfaceHolder.Callback {
    private val game = TetrisGame()
    private var gameThread: Thread? = null
    private var running = false

    init {
        holder.addCallback(this)
    }

    override fun surfaceCreated(holder: SurfaceHolder) {
        running = true
        gameThread = Thread {
            while (running) {
                val canvas = holder.lockCanvas()
                if (canvas != null) {
                    game.draw(canvas)
                    holder.unlockCanvasAndPost(canvas)
                }
                game.moveDown()
                Thread.sleep(500) // Скорость падения фигур
            }
        }
        gameThread?.start()
    }

    override fun surfaceDestroyed(holder: SurfaceHolder) {
        running = false
        gameThread?.join()
    }

    override fun surfaceChanged(holder: SurfaceHolder, format: Int, width: Int, height: Int) {}
}
